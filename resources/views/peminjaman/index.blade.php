@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3"><span class="bg-secondary-subtle px-3 py-1 rounded shadow-sm">PEMINJAMAN BARANG</span></h1>
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('success') }}</li>
                            </ul>
                        </div>
                        @endif
                      <a href="/peminjaman/create" class="btn btn-primary mb-3 shadow">+ Tambah Pinjaman</a>
                      <h6 class="mb-3"><span class="text-secondary">Daftar Barang Yang Di Pinjam</span></h6>
                      <table class="table table-striped border">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Peminjam</th>
                                <th>Barang Yang Di Pinjam</th>
                                <th>Waktu Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Tujuan Pinjam</th>
                                <th>Alamat Pinjam</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjamans as $peminjaman)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peminjaman->peminjams->nama }}</td>
                                    <td>{{ $peminjaman->inventaris->nama }}</td>
                                    <td>{{ $peminjaman->waktu_pinjam }}</td>
                                    <td>{{ $peminjaman->waktu_kembali }}</td>
                                    <td>{{ $peminjaman->tujuan_pinjam }}</td>
                                    <td>{{ $peminjaman->alamat_pinjam }}</td>
                                    <td>
                                        <div class="row">
                                            @php
                                                $peminjamanStatus = $peminjaman->statuses()->orderBy('peminjaman_status.tanggal', 'DESC')->first()
                                            @endphp
                                            @if ($peminjamanStatus)
                                            <div class="col-md-12">
                                                {{ $peminjamanStatus->nama }}
                                                <a class="pensil" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" peminjaman-id="{{ $peminjaman->id }}">
                                                    <span data-feather="edit-2"></span>
                                                </a>
                                            </div>
                                            @endif
                                            <div class="col-md-12">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="/peminjaman/{{ $peminjaman->id }}" method="post" class="d-inline">
                                            @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghpus Data?')">Hapus</button>
                                        </form>
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
    <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Status</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/peminjaman/update-status" method="post" id="formUpdate">
              @csrf
              @method('put')
              <input type="hidden" name="peminjaman_id">
              <div class="mb-3">
                <label for="status_id" class="form-label">Status</label>
                <select class="form-select" name="status_id" id="status_id" aria-label="Default select example">
                  @foreach ($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="btnUpdate">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  @push('scripts')
  <script>
    $(document).ready(function() {
      $("#btnUpdate").click(function() {
          $("#formUpdate").submit
      });

      $(".pensil").click(function() {
          var peminjaman_id = $(this).attr('peminjaman-id')
          $("input[name=peminjaman_id]").val(peminjaman_id)
      });
    });
  </script>
  @endpush
@endsection
