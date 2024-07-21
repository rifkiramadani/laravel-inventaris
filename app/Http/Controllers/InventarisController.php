<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Kondisi;
use App\Models\Kategori;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class InventarisController extends Controller
{
    public function index() {
        $inventaris = Inventaris::all();
        return view('inventaris.index', [
            'inventaris' => $inventaris,
        ]);
    }

    public function create() {
        $kategori = Kategori::all();
        $kondisi = Kondisi::all();
        return view('inventaris.create', [
            'kategori' => $kategori,
            'kondisi' => $kondisi,
        ]);
    }

    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'nomor_seri' => 'required|unique:inventaris',
            'nama' => 'required',
            'deskripsi' => 'required|min:5',
            'kategori_id' => 'required',
            'kondisi_id' => 'required',
            'harga_pembelian' => 'required',
            'tanggal_pembelian' => 'required'
        ]);


        $inventaris = Inventaris::create([
            'nomor_seri' => $request->nomor_seri,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'kondisi_id' => $request->kondisi_id,
            'harga_pembelian' => $request->harga_pembelian,
            'tanggal_pembelian' => $request->tanggal_pembelian,
        ]);

        //ambil request dari user dan masukkan ke dalam variable $file
        $file = $request->file('files');
        //setelah itu deklarasikan nama file nya dengan nama random beserta ekstensi filenya
        $filename = time().rand(1,200).'.'.$file->extension();
        //selanjutnya pindahkan file yang telah di upload tadi ke dalam folder public di dlaam folder uploads
        $file->move(public_path('uploads'), $filename);
        //setelah itu masukkan fungsi create dengan mengisikan field field nya berdasarkan yang telah di deklarasikan di bawah
        Gambar::create([
            'filename' => $filename,
            'inventaris_id' => $inventaris->id
        ]);

        return redirect('/inventaris')->with('success', 'Data Barang Berhasil Di Tambah');
    }

    public function edit($id) {
        $inventaris = Inventaris::find($id);
        return view('inventaris.edit', [
            'inventaris' => $inventaris,
        ]);
    }

    public function update(Request $request, $id) {
        // dd($request->all());
        $request->validate([
            'nomor_seri' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required|min:5',
            'kategori_id' => 'required',
            'kondisi_id' => 'required',
            'harga_pembelian' => 'required',
            'tanggal_pembelian' => 'required'
        ]);

        $inventaris = Inventaris::find($id);

        $inventaris->update([
            'nomor_seri' => $request->nomor_seri,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'kondisi_id' => $request->kondisi_id,
            'harga_pembelian' => $request->harga_pembelian,
            'tanggal_pembelian' => $request->tanggal_pembelian,
        ]);

        if ($request->hasFile('files')) {
            // Hapus gambar lama
            $oldImage = Gambar::where('inventaris_id', $inventaris->id)->first();
            if ($oldImage) {
                $oldFilePath = public_path('uploads') . '/' . $oldImage->filename;
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
                $oldImage->delete();
            }
            //ambil request dari user dan masukkan ke dalam variable $file
            $file = $request->file('files');
            //setelah itu deklarasikan nama file nya dengan nama random beserta ekstensi filenya
            $filename = time().rand(1,200).'.'.$file->extension();
            //selanjutnya pindahkan file yang telah di upload tadi ke dalam folder public di dlaam folder uploads
            $file->move(public_path('uploads'), $filename);
            //setelah itu masukkan fungsi create dengan mengisikan field field nya berdasarkan yang telah di deklarasikan di bawah
            Gambar::create([
                'filename' => $filename,
                'inventaris_id' => $inventaris->id
            ]);

        }

        return redirect('/inventaris')->with('success', 'Data Barang Berhasil Di Ubah');
    }

    public function destroy($id) {
        $inventaris = Inventaris::find($id);
        $inventaris->delete();

        return redirect('/inventaris')->with('success', 'Data Barang Berhasil Di Hapus');
    }
}
