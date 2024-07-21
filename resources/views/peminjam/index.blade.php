@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3"><span class="bg-secondary-subtle px-3 py-1 rounded shadow-sm">PEMINJAM</span></h1>
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('success') }}</li>
                            </ul>
                        </div>
                        @endif
                      <a href="/peminjam/create" class="btn btn-primary mb-3 shadow">+ Tambah Peminjam</a>
                      <h6 class="mb-3"><span class="text-secondary">Daftar Peminjam</span></h6>
                      <table class="table table-striped border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjams as $peminjam)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $peminjam->nama }}</td>
                                <td>{{ $peminjam->email}}</td>
                                <td>{{ $peminjam->alamat }}</td>
                                <td>{{ $peminjam->telepon}}</td>
                                <td>
                                    <div class="row gap-4">
                                        <div class="col-md-3">
                                            <a href="/peminjam/{{ $peminjam->id }}/edit" class="btn btn-warning">Ubah</a>
                                        </div>
                                        <div class="col-md-3">
                                            <form action="/peminjam/{{ $peminjam->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghpus Data?')">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection
