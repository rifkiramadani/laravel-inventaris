@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-3"><span class="bg-secondary-subtle px-3 py-1 rounded shadow-sm">TAMBAH PEMINJAM</span></h1>
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
                  <h6 class="mb-3"><span class="text-secondary">Daftarkan Peminjam Terlebih Dahulu Sebelum Mereka Meminjam Barang</span></h6>
                  <form action="/peminjam" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                      </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                      </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5" required></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                      </div>
                      <button type="submit" class="btn btn-primary">+ Tambah</button>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection