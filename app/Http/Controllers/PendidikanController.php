<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DosenPendidikan;
use App\Models\Dosen;

class PendidikanController extends Controller
{ 
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            // Admin lihat semua dosen + ringkasan pendidikannya
            $dosen = DB::table('ms_dosen as m')
            ->leftJoin('ms_dosen_pendidikan as dp', 'dp.id_dosen', '=', 'm.id')
            ->select(
                'm.id as id_dosen',
                'm.nama as nama_dosen',
                'dp.gelar'
            )
            ->orderBy('m.nama')
            ->get();

            return view('pendidikan.index', compact('dosen'));
        } else {
            // Dosen → langsung ke halaman detail (show)
            return redirect()->route('pendidikan.show', Auth::user()->id_dosen);
        }
    }

    public function show($id_dosen)
    {
        // Detail pendidikan per dosen
        $pendidikan = DB::table('ms_dosen_pendidikan as dp')
                    ->leftJoin('ms_dosen as m', 'm.id', '=', 'dp.id_dosen')
                    ->leftJoin('ms_jenjang as j', 'j.id', '=', 'dp.id_jenjang')
                    ->select(
                        'dp.id',
                        'dp.jurusan',
                        'dp.nama_sekolah',
                        'dp.tgl_lulus',
                        'dp.gelar',
                        'j.nama_jenjang',
                        'm.id as id_dosen',
                        'm.nama as nama_dosen'
                    )
                    ->where('m.id', $id_dosen)
                    ->get();

        // Data dosen (untuk header di show.blade)
        $dosenData = DB::table('ms_dosen')->where('id', $id_dosen)->first();

        return view('pendidikan.show', [
            'dosen' => $dosenData,
            'pendidikan' => $pendidikan,
        ]);
    }

    public function create($id_dosen)
    {
        $dosen = Dosen::findOrFail($id_dosen);
        $jenjang = DB::table('ms_jenjang')->get();
        return view('pendidikan.create', compact('dosen', 'jenjang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dosen'     => 'required|integer|exists:ms_dosen,id',
            'id_jenjang' => 'required|exists:ms_jenjang,id',
            'jurusan'      => 'required|string|max:100',
            'nama_sekolah' => 'required|string|max:100',
            'tgl_lulus'    => 'required|date',
            'gelar'        => 'nullable|string|max:50',
        ]);

        DosenPendidikan::create($request->all());

        return redirect()->route('pendidikan.show', $request->id_dosen)
                         ->with('success', 'Data pendidikan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pendidikan = DosenPendidikan::findOrFail($id);
        $jenjang = DB::table('ms_jenjang')->get();
        return view('pendidikan.edit', compact('pendidikan', 'jenjang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_jenjang'   => 'required|integer',
            'jurusan'      => 'required|string|max:100',
            'nama_sekolah' => 'required|string|max:100',
            'tgl_mulai'    => 'required|date',
            'tgl_lulus'    => 'required|date',
            'gelar'        => 'nullable|string|max:50',
            'ipk' => 'nullable|numeric',
            'link_ijazah_transkip' => 'nullable|string',
            'ket_ijazah_transkip' => 'nullable|string',
        ]);

        $pendidikan = DosenPendidikan::findOrFail($id);
        $pendidikan->update($request->all());

        return redirect()->route('pendidikan.show', $pendidikan->id_dosen)
                        ->with('success', 'Data pendidikan berhasil diperbarui.');
    }

    public function destroy(DosenPendidikan $pendidikan)
    {
        $id_dosen = $pendidikan->id_dosen;
        $pendidikan->delete();

        return redirect()->route('pendidikan.show', $id_dosen)
                         ->with('success', 'Data pendidikan berhasil dihapus.');
    }
}
