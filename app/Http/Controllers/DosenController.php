<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class DosenController extends Controller
{
    // Tampilkan data dosen
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $dosen = Dosen::all();
        } else {
            $dosen = Dosen::where('id', $user->id_dosen)->get();
        }

        return view('dosen.index', compact('dosen', 'user'));
    }

    // Form tambah dosen (hanya admin)
    public function create()
    {
        $this->authorizeAdmin();
        return view('dosen.create');
    }

    // Simpan data dosen (hanya admin)
    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'nik' => 'nullable|unique:ms_dosen',
            'nidn' => 'required|unique:ms_dosen',
            'nama' => 'required',
            'email' => 'required|email|unique:ms_dosen|unique:users',
            'password' => 'nullable|min:6',
        ]);

        // buat dosen
        $dosen = Dosen::create([
            'nik' => $request->nik,
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password ?? '-', // default '-'
        ]);

         // buat akun user
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password ?? 'password123'), // default password
            'role' => 'dosen',
            'id_dosen' => $dosen->id,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    // Form edit dosen
    public function edit($id)
    {
        $user = Auth::user();

        if ($user->role === 'dosen' && $user->id_dosen != $id) {
            abort(403, 'Tidak diizinkan.');
        }

        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen', 'user'));
    }

    // Update dosen
    public function update(Request $request, $id)
    {
        $userLogin = Auth::user();

        if ($userLogin->role === 'dosen' && $userLogin->id_dosen != $id) {
            abort(403, 'Tidak diizinkan.');
        }

        $dosen = Dosen::findOrFail($id);

        $request->validate([
            'nidn' => 'required|unique:ms_dosen,nidn,' . $id,
            'no_ktp' => 'required',
            'nama' => 'required',
            'tmp_lhr' => 'required',
            'tgl_lhr' => 'nullable|date',
            'email' => 'required|email|unique:ms_dosen,email,' . $id,
            'alamat' => 'required',
            'password' => 'nullable|min:6',
        ]);

        // update ms_dosen
        $dosen->update([
            'nik' => $request->nik,
            'nidn' => $request->nidn,
            'no_ktp' => $request->no_ktp,
            'nama' => $request->nama,
            'tmp_lhr' => $request->tmp_lhr,
            'tgl_lhr' => $request->tgl_lhr,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => $request->password ?? $dosen->password,
        ]);

        // update user
        $user = User::where('id_dosen', $dosen->id)->first();
        if ($user) {
            $user->update([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => $request->filled('password')
                                ? Hash::make($request->password)
                                : $user->password,
            ]);
        }

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    // Hapus dosen (hanya admin)
    public function destroy($id)
    {
        $this->authorizeAdmin();

        $dosen = Dosen::findOrFail($id);

        User::where('id_dosen', $dosen->id)->delete();
        $dosen->delete();

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus.');
    }

    private function authorizeAdmin()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Hanya admin yang bisa melakukan ini.');
        }
    }
}
