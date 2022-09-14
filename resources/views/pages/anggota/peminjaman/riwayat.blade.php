@extends('layouts.anggota')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Riwayat buku yang sudah di dikembalikan</h2>
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
                                                <th>Nama Peminjam</th>
                                                <th>Judul</th>
                                                <th>Penulis</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($peminjamans as $peminjaman)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $peminjaman->user->name}}</td>
                                                    <td>{{ $peminjaman->buku->judul}}</td>
                                                    <td>{{ $peminjaman->buku->penulis}}</td>
                                                    <td>{{ $peminjaman->tgl_pinjam}}</td>
                                                    <td>{{ $peminjaman->tgl_kembali}}</td>
                                                    <td>{{ $peminjaman->status_peminjaman}}</td>
                                                    {{-- <td>
                                                        <a href="{{route('peminjaman.edit', $peminjaman->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil d-inline" style="margin-right: 5px"></i>Update Peminjaman</a>
                                                        <form action="{{ route('peminjaman.verifikasi')}}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            <button class="btn btn-success mt-2 btn-sm">
                                                                <i class="fa fa-check d-inline mr-2"></i>
                                                                Verifikasi
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('peminjaman.retur', $peminjaman->id)}}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-success mt-2 btn-sm">
                                                                <i class="fa fa-return d-inline mr-2"></i>
                                                                Kembalikan Buku
                                                            </button>
                                                        </form>
                                                    </td> --}}
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">Tidak Ada Riwayat Peminjaman</td>
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
