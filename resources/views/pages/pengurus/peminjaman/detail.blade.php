@extends('layouts.anggota')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Detail Peminjaman</h2>
                <p class="dashboard-subtitle">
                    Detail Peminjaman
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
                                                <th>Nama TBM</th>
                                                <th>Foto Buku</th>
                                                <th>Judul Buku</th>
                                                <th>Penulis</th>
                                                <th>Penerbit</th>
                                                <th>Status Peminjaman</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($detailPeminjamans as $detailPeminjaman)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $detailPeminjaman->buku->tbm->nama_tbm}}</td>
                                                    <td>
                                                        <a href="{{asset('storage/'. $detailPeminjaman->buku->foto)}}" target="_blank">
                                                            <img src="{{Storage::url($detailPeminjaman->buku->foto)}}" width="50" height="50" class="rounded-square">
                                                        </a>
                                                    </td>
                                                    <td>{{ $detailPeminjaman->buku->judul}}</td>
                                                    <td>{{ $detailPeminjaman->buku->penulis}}</td>
                                                    <td>{{ $detailPeminjaman->buku->penerbit}}</td>
                                                    <td>{{ $detailPeminjaman->status_peminjaman}}</td>
                                                    <td>
                                                        @if ($detailPeminjaman->status_peminjaman == 'Buku sudah bisa di ambil')
                                                        <form action="{{ route('peminjaman.retur', $detailPeminjaman->id)}}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-success mt-2 btn-sm">
                                                                <i class="fa fa-return d-inline mr-2"></i>
                                                                Kembalikan Buku
                                                            </button>
                                                        </form>
                                                        @else
                                                        <form action="{{ route('peminjaman.retur', $detailPeminjaman->id)}}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-success mt-2 btn-sm" disabled>
                                                                <i class="fa fa-return d-inline mr-2"></i>
                                                                Kembalikan Buku
                                                            </button>
                                                        </form>
                                                        @endif
                                                         <form action="{{ route('peminjaman.verifikasi', $detailPeminjaman->id)}}"
                                                            method="POST">
                                                            @csrf
                                                            <button class="btn btn-success btn-sm mt-2">
                                                                <i class="fa fa-check d-inline mr-2"></i>
                                                                Verifikasi Peminjaman
                                                            </button>
                                                        </form>  
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
