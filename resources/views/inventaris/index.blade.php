@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3"><span class="bg-secondary-subtle px-3 py-1 rounded shadow-sm">INVENTARIS</span></h1>
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('success') }}</li>
                            </ul>
                        </div>
                        @endif
                      <a href="/inventaris/create" class="btn btn-primary mb-3 shadow">+ Tambah Barang</a>
                      <h6 class="mb-3"><span class="text-secondary">Barang-barang yang tersedia di Inventaris</span></h6>
                      <table class="table table-striped border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Nomor Seri</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Kondisi</th>
                                <th>Harga Pembelian</th>
                                <th>Tanggal Pembelian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventaris as $i)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="./uploads/{{ $i->gambars->filename }}" alt="{{ $i->gambars->filename }}" class="img-thumbnail" width="150px">
                                </td>
                                <td>{{ $i->nama }}</td>
                                <td>{{ $i->nomor_seri }}</td>
                                <td>{{ $i->deskripsi }}</td>
                                <td>{{ $i->kategoris->nama }}</td>
                                <td>{{ $i->kondisis->nama }}</td>
                                <td>{{ $i->harga_pembelian }}</td>
                                <td>{{ $i->tanggal_pembelian }}</td>
                                <td>
                                    <div class="row gap-4">
                                        <div class="col-md-3">
                                            <a href="/inventaris/{{ $i->id }}/edit" class="btn btn-warning">Ubah</a>
                                        </div>
                                        <div class="col-md-3">
                                            <form action="/inventaris/{{ $i->id }}" method="post" class="d-inline">
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