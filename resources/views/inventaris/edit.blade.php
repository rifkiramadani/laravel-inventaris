@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-3"><span class="bg-secondary-subtle px-3 py-1 rounded shadow-sm">UBAH DATA BARANG</span></h1>
            <div class="card">
                <div class="card-body">
                  @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                  <h6 class="mb-3"><span class="text-secondary">Ubah Barang yang ada di Data Inventaris</span></h6>
                  <form action="/inventaris/{{ $inventaris->id }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $inventaris->nama }}" required>
                      </div>
                    <div class="mb-3">
                        <label for="nomor_seri" class="form-label">Nomor Seri</label>
                        <input type="text" class="form-control" id="nomor_seri" name="nomor_seri" value="{{ $inventaris->nomor_seri }}" required>
                      </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $inventaris->deskripsi }}" required>
                      </div>
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" id="kategori_id" name="kategori_id" required>
                            <option>Pilih Kategori Barang</option>
                                <option value="1" @if($inventaris->kategori_id === 1) echo selected @endif>Elektronik</option>
                                <option value="2" @if($inventaris->kategori_id === 2) echo selected @endif>Furnitur</option>
                                <option value="3" @if($inventaris->kategori_id === 3) echo selected @endif>Peralatan Kantor</option>
                                <option value="4" @if($inventaris->kategori_id === 4) echo selected @endif>Peralatan Mekanik</option>
                                <option value="5" @if($inventaris->kategori_id === 5) echo selected @endif>Peralatan IT</option>
                                <option value="6" @if($inventaris->kategori_id === 6) echo selected @endif>Peralatan Kebersihan</option>
                                <option value="7" @if($inventaris->kategori_id === 7) echo selected @endif>Peralatan Keamanan</option>
                                <option value="8" @if($inventaris->kategori_id === 8) echo selected @endif>Peralatan Medis</option>
                                <option value="9" @if($inventaris->kategori_id === 9) echo selected @endif>Peralatan Audio/Visual</option>
                          </select>
                      </div>
                    <div class="mb-3">
                        <label for="kondisi_id" class="form-label">Kondisi</label>
                        <select class="form-select" aria-label="Default select example" id="kondisi_id" name="kondisi_id" required>
                            <option selected>Pilih Kondisi Barang</option>
                                <option value="1" @if($inventaris->kondisi_id === 1) echo selected @endif>Baik</option>
                                <option value="2" @if($inventaris->kondisi_id === 2) echo selected @endif>Rusak</option>
                          </select>
                      </div>
                      <div class="mb-3">
                        <label for="gambar_id" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar_id" name="files" required>
                      </div>
                      <div class="mb-3">
                        <label for="harga_pembelian" class="form-label">Harga Pembelian</label>
                        <input type="number" class="form-control" id="harga_pembelian" name="harga_pembelian" value="{{ $inventaris->harga_pembelian }}" required>
                      </div>
                      <div class="mb-3">
                        <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
                        <input type="datetime-local" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" required>
                      </div>
                      <button type="submit" class="btn btn-primary">+ Ubah</button>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection