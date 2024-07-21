<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Peminjam;
use App\Models\Inventaris;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PeminjamanController extends Controller
{
    public function index() {
        $peminjamans = Peminjaman::all();
        $statuses = Status::all();
        return view('peminjaman.index', [
            'peminjamans' => $peminjamans,
            'statuses' => $statuses,
        ]);
    }

    public function create() {
        $peminjams = Peminjam::all();
        $invantaris = Inventaris::all();
        return view('peminjaman.create', [
            'peminjams' => $peminjams,
            'inventaris' => $invantaris,
        ]);
    }

    public function store(Request $request) {
        $peminjaman = Peminjaman::create($request->all());
        $peminjaman->statuses()->attach('1',['tanggal' => now()]);
        return redirect('/peminjaman')->with('success', 'Data Peminjaman Berhasil Di Tambah');
    }

    public function updateStatus(Request $request) {
        // dd($request->all());
        $peminjaman = Peminjaman::find($request->peminjaman_id);
        $peminjaman->statuses()->attach($request->status_id,['tanggal' => $request->tanggal]);
        return redirect('/peminjaman')->with('success', 'Status Peminjaman Berhasil Di Ubah');
    }

    public function destroy($id) {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->delete();
        return redirect('/peminjaman')->with('success', 'Data Peminjaman Berhasil Di Hapus');
    }
}
