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
                                                <th>Nama</th>
                                                <th>No.Peminjaman</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($peminjamans as $peminjaman)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $peminjaman->user->name}}</td>
                                                    <td>{{ $peminjaman->no_peminjaman}}</td>
                                                    <td>{{ $peminjaman->tgl_pinjam}}</td>
                                                    <td>{{ $peminjaman->tgl_kembali}}</td>
                                                    <td>                                                        
                                                        <a href="{{route('peminjaman.detail_pengurus', $peminjaman->id)}}" class="btn btn-sm btn-success">Detail Peminjaman</a>
                                                        <a href="{{route('peminjaman.edit', $peminjaman->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil d-inline" style="margin-right: 5px"></i>Update tanggal kembali</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">Tidak Ada Peminjaman</td>
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
