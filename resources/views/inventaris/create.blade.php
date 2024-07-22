@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-3 animate__animated animate__fadeInRight"><span class="bg-secondary-subtle px-3 py-1 rounded shadow-sm">TAMBAH BARANG</span></h1>
            <div class="card animate__animated animate__fadeInUp">
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
                  <h6 class="mb-3"><span class="text-secondary">Tambah Barang Untuk Di letakkan di Data Inventaris</span></h6>
                  <form action="/inventaris" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                      </div>
                    <div class="mb-3">
                        <label for="nomor_seri" class="form-label">Nomor Seri</label>
                        <input type="text" class="form-control" id="nomor_seri" name="nomor_seri" required>
                      </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                      </div>
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" id="kategori_id" name="kategori_id" required>
                            <option selected>Pilih Kategori Barang</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                          </select>
                      </div>
                    <div class="mb-3">
                        <label for="kondisi_id" class="form-label">Kondisi</label>
                        <select class="form-select" aria-label="Default select example" id="kondisi_id" name="kondisi_id" required>
                            <option selected>Pilih Kondisi Barang</option>
                            @foreach ($kondisi as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="mb-3">
                        <label for="gambar_id" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar_id" name="files" required>
                      </div>
                      <div class="mb-3">
                        <label for="harga_pembelian" class="form-label">Harga Pembelian</label>
                        <input type="number" class="form-control" id="harga_pembelian" name="harga_pembelian" required>
                      </div>
                      <div class="mb-3">
                        <label for="tanggal_pembelian" class="form-label">Tanggal Pembelian</label>
                        <input type="datetime-local" class="form-control" id="tanggal_pembelian" name="tanggal_pembelian" required>
                      </div>
                      <button type="submit" class="btn btn-primary">+ Tambah</button>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection