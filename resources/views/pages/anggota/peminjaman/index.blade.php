@extends('layouts.anggota')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Daftar buku yang di pinjam</h2>
                <p class="dashboard-subtitle">
                    Daftar Buku
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <table class="table table-hover scroll-horizontal-vertical w-100 table-bordered"
                                        id="table1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Foto</th>
                                                <th>Penulis</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Status Pinjam</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($peminjamans as $peminjaman)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $peminjaman->buku->judul}}</td>
                                                    <td>
                                                        <a href="{{asset('storage/'. $peminjaman->buku->foto)}}" target="_blank">
                                                            <img src="{{Storage::url($peminjaman->buku->foto)}}" width="50" height="50" class="rounded-square">
                                                        </a>
                                                    </td>
                                                    <td>{{ $peminjaman->buku->penulis}}</td>
                                                    <td>{{ $peminjaman->tgl_pinjam}}</td>
                                                    <td>{{ $peminjaman->tgl_kembali}}</td>
                                                    <td>{{ $peminjaman->status_peminjaman}}</td>
                                                    <td>
                                                        {{-- <a href="{{route('peminjaman.detail', $peminjaman->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye d-inline"></i>Detail</a> --}}
                                                        <form action="{{ route('peminjaman.destroy', $peminjaman->id)}}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger mt-2 btn-sm">
                                                                <i class="fa fa-trash d-inline">Hapus </i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">Tidak Ada kategori</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-scripts')
    <script>
        window.addEventListener('DOMContentLoaded', event => {
            // Simple-DataTables
            // https://github.com/fiduswriter/Simple-DataTables/wiki

            const datatablesSimple = document.getElementById('table1');
            if (datatablesSimple) {
                new simpleDatatables.DataTable(datatablesSimple);
            }
        });
    </script>
@endpush
