<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DosenKeluarga;
use App\Models\Dosen;

class KeluargaController extends Controller
{ 
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            // Admin lihat semua dosen + ringkasan keluarga
            $dosen = DB::table('ms_dosen as m')
            ->leftJoin('ms_dosen_keluarga as dk', 'dk.id_dosen', '=', 'm.id')
            ->select(
                'm.id as id_dosen',
                'm.nama as nama_dosen',
                'm.nidn',
            )
            ->orderBy('m.nama')
            ->get();

            return view('keluarga.index', compact('dosen'));
        } else {
            // Dosen → langsung ke halaman detail (show)
            return redirect()->route('keluarga.show', Auth::user()->id_dosen);
        }
    }

    public function show($id_dosen)
    {
        // Detail Keluarga per dosen
        $keluarga = DB::table('ms_dosen_keluarga as dk')
                    ->leftJoin('ms_dosen as m', 'm.id', '=', 'dk.id_dosen')
                    ->select(
                        'dk.id',
                        'dk.nama',
                        'dk.nik',
                        'dk.jk',
                        'dk.tmpt_lahir',
                        'dk.tgl_lahir',
                        'dk.hubungan_keluarga',
                        'm.nama'
                    )
                    ->where('m.id', $id_dosen)
                    ->get();

        // Data dosen (untuk header di show.blade)
        $dosenData = DB::table('ms_dosen')->where('id', $id_dosen)->first();

        return view('keluarga.show', [
            'dosen' => $dosenData,
            'keluarga' => $keluarga,
        ]);
    }

    public function create($id_dosen)
    {
        $dosen = Dosen::findOrFail($id_dosen);
        return view('keluarga.create', compact('dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dosen'           => 'required|integer|exists:ms_dosen,id',
            'nama'                => 'required|string|max:100',
            'nik'                 => 'required|string|max:20',
            'jk'                  => 'required|in:L,P',
            'tmpt_lahir'          => 'required|string|max:50',
            'tgl_lahir'           => 'required|date',
            'hubungan_keluarga'   => 'required|string|max:50',
        ]);

        DosenKeluarga::create($request->all());

        return redirect()
            ->route('keluarga.show', $request->id_dosen)
            ->with('success', 'Data keluarga berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $keluarga = DosenKeluarga::findOrFail($id);
        return view('keluarga.edit', compact('keluarga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_dosen'           => 'required|integer|exists:ms_dosen,id',
            'nama'                => 'required|string|max:100',
            'nik'                 => 'required|string|max:20',
            'jk'                  => 'required|in:L,P',
            'tmpt_lahir'          => 'required|string|max:50',
            'tgl_lahir'           => 'required|date',
            'hubungan_keluarga'   => 'required|string|max:50',
        ]);

        $keluarga = DosenKeluarga::findOrFail($id);
        $keluarga->update($request->all());

        return redirect()->route('keluarga.show', $keluarga->id_dosen)
                        ->with('success', 'Data keluarga berhasil diperbarui.');
    }

    public function destroy(DosenKeluarga $keluarga)
    {
        $id_dosen = $keluarga->id_dosen;
        $keluarga->delete();

        return redirect()->route('keluarga.show', $id_dosen)
                         ->with('success', 'Data keluarga berhasil dihapus.');
    }
}
