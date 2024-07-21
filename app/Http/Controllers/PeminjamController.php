<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeminjamController extends Controller
{
    public function index() {
        $peminjams = Peminjam::all(); 
        return view('peminjam.index', [
            'peminjams' => $peminjams,
        ]);
    }

    public function create() {
        return view('peminjam.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);

        Peminjam::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect('/peminjam')->with('success', 'Data Peminjam Berhasil Di Tambah atau Di Daftarkan');
    }

    public function edit($id) {
        $peminjam = Peminjam::find($id);
        return view('peminjam.edit', [
            'peminjam' => $peminjam,
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email:dns',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);

        $peminjam = Peminjam::find($id);

        $peminjam->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect('/peminjam')->with('success', 'Data Peminjam Berhasil Di Ubah');
    }

    public function destroy($id) {
        $peminjam = Peminjam::find($id);

        $peminjam->delete();

        return redirect('/peminjam')->with('success', 'Data Peminjam Berhasil Di Hapus');
    }
}
