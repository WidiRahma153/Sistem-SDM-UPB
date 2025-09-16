<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DosenPelatihan;
use App\Models\Dosen;

class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            // Admin lihat semua dosen + ringkasan pelatihannya
            $dosen = DB::table('ms_dosen as m')
            ->select(
                'm.id as id_dosen',
                'm.nama as nama_dosen',
                'm.nidn'
            )
            ->orderBy('m.nama')
            ->get();

            return view('pelatihan.index', compact('dosen'));
        } else {
            // Dosen → langsung ke halaman detail (show)
            return redirect()->route('pelatihan.show', Auth::user()->id_dosen);
        }
    }

    public function show($id_dosen)
    {
        $pelatihan = DB::table('ms_dosen_pelatihan as dp')
                    ->leftJoin('ms_dosen as m', 'm.id', '=', 'dp.id_dosen')
                    ->select(
                        'dp.id',
                        'dp.no_surat_tugas',
                        'dp.tgl_mulai',
                        'dp.tgl_selesai',
                        'dp.nama_kegiatan',
                        'dp.tempat_kegiatan',
                        'dp.penyelenggara',
                        'm.nama'
                    )
                    ->where('m.id', $id_dosen)
                    ->get();

        // Data dosen (untuk header di show.blade)
        $dosenData = DB::table('ms_dosen')->where('id', $id_dosen)->first();
        // if (!$dosenData) {
        // abort(404, 'Dosen tidak ditemukan');
        // }

        return view('pelatihan.show', [
            'dosen' => $dosenData,
            'pelatihan' => $pelatihan,
        ]);
    }

    public function create($id_dosen)
    {
        // dd($id_dosen);
        $dosen = Dosen::findOrFail($id_dosen);
        return view('pelatihan.create', compact('dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_dosen'           => 'required|integer|exists:ms_dosen,id',
            'no_surat_tugas'     => 'required|string|max:100',
            'tgl_mulai'          => 'required|date',
            'tgl_selesai'        => 'required|date',
            'nama_kegiatan'      => 'required|string|max:50',
            'tempat_kegiatan'    => 'required|string|max:50',
            'penyelenggara'      => 'required|string|max:50',
        ]);

        DosenPelatihan::create($request->all());

        return redirect()
            ->route('pelatihan.show', $request->id_dosen)
            ->with('success', 'Data pelatihan berhasil ditambahkan.');

    }

    public function edit($id)
    {
        $pelatihan = DosenPelatihan::findOrFail($id);
        return view('pelatihan.edit', compact('pelatihan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_dosen'           => 'required|integer|exists:ms_dosen,id',
            'no_surat_tugas'     => 'required|string|max:100',
            'tgl_mulai'          => 'required|date',
            'tgl_selesai'        => 'required|date',
            'durasi'             => 'required|string|max:50',
            'nama_kegiatan'      => 'required|string|max:50',
            'tempat_kegiatan'    => 'required|string|max:50',
            'penyelenggara'      => 'required|string|max:50',
            'sebagai_kode'       => 'nullable|string|max:20',
            'sertifikat'         => 'nullable|string|max:50',
            'link_surat_tugas'   => 'nullable|string|max:50',
            'ket_surat_tugas'    => 'nullable|string|max:50',

        ]);
        
        $pelatihan = DosenPelatihan::findOrFail($id);
        $pelatihan->update($request->all());

        return redirect()->route('pelatihan.show', $pelatihan->id_dosen)
                        ->with('success', 'Data pelatihan berhasil diperbarui.');
    }

    public function destroy(DosenPelatihan $pelatihan)
    {
        $id_dosen = $pelatihan->id_dosen;
        $pelatihan->delete();

        return redirect()->route('pelatihan.show', $id_dosen)
                         ->with('success', 'Data pelatihan berhasil dihapus.');
    }
}
