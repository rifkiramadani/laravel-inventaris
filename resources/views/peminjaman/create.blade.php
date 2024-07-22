@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-3 animate__animated animate__fadeInRight"><span class="bg-secondary-subtle px-3 py-1 rounded shadow-sm">TAMBAH PINJAMAN</span></h1>
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
                  <h6 class="mb-3"><span class="text-secondary">Tambah Peminjaman Barang</span></h6>
                  <form action="/peminjaman" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="peminjam_id" class="form-label">Nama Peminjam</label>
                        <select class="form-control" name="peminjam_id" id="peminjam_id">
                            <option selected>Pilih Peminjam Yang Telah Terdaftar</option>
                            @foreach ($peminjams as $peminjam)
                                <option value="{{ $peminjam->id }}">{{ $peminjam->nama }}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="mb-3">
                        <label for="inventaris_id" class="form-label">Nama Barang</label>
                        <select class="form-control" name="inventaris_id" id="inventaris_id">
                            <option selected>Pilih Barang Yang Ingin Di Pinjam</option>
                            @foreach ($inventaris as $i)
                                <option value="{{ $i->id }}">{{ $i->deskripsi }}</option>
                            @endforeach
                        </select>
                      </div>
                    <div class="mb-3">
                        <label for="waktu_pinjam" class="form-label">Waktu Pinjam</label>
                        <input type="datetime-local" class="form-control" id="waktu_pinjam" name="waktu_pinjam" required>
                      </div>
                    <div class="mb-3">
                        <label for="waktu_kembali" class="form-label">Waktu Kembali</label>
                        <input type="datetime-local" class="form-control" id="waktu_kembali" name="waktu_kembali" required>
                      </div>
                    <div class="mb-3">
                        <label for="tujuan_pinjam" class="form-label">Tujuan Pinjam</label>
                        <textarea class="form-control" name="tujuan_pinjam" id="tujuan_pinjam" cols="30" rows="5" required></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="alamat_pinjam" class="form-label">Alamat Pinjam</label>
                        <textarea class="form-control" id="alamat_pinjam" name="alamat_pinjam" cols="30" rows="5" required></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">+ Tambah</button>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection