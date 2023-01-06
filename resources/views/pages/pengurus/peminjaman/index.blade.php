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
                                                <th>Judul Buku</th>
                                                <th>Foto</th>
                                                <th>Nama TBM</th>
                                                <th>Kode Peminjaman</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Jumlah Pinjam</th>
                                                <th>Status Peminjaman</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($peminjamans as $peminjaman)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $peminjaman->user->name }}</td>
                                                    <td>{{ $peminjaman->buku->judul }}</td>
                                                    <td>
                                                        <a href="{{ asset('storage/' . $peminjaman->buku->foto) }}"
                                                            target="_blank">
                                                            <img src="{{ Storage::url($peminjaman->buku->foto) }}"
                                                                width="50" height="50" class="rounded-square">
                                                        </a>
                                                    </td>
                                                    <td>{{ $peminjaman->buku->tbm->nama_tbm }}</td>
                                                    <td>{{ $peminjaman->kode_peminjaman }}</td>
                                                    <td>{{ $peminjaman->tgl_pinjam }}</td>
                                                    <td>{{ $peminjaman->tgl_kembali }}</td>
                                                    <td>{{ $peminjaman->jumlah_pinjam }}</td>
                                                    <td>{{ $peminjaman->status_peminjaman }}</td>
                                                    <td>
                                                        @if ($peminjaman->status_peminjaman == 'Buku sudah bisa di ambil')
                                                            <form action="{{ route('peminjaman.retur', $peminjaman->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-success mt-2 btn-sm">
                                                                    <i class="fa fa-return d-inline mr-2"></i>
                                                                    Kembalikan Buku
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('peminjaman.retur', $peminjaman->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-success mt-2 btn-sm" disabled>
                                                                    <i class="fa fa-return d-inline mr-2"></i>
                                                                    Kembalikan Buku
                                                                </button>
                                                            </form>
                                                        @endif
                                                        @if ($peminjaman->status_peminjaman == 'Buku sudah bisa di ambil')
                                                            <form
                                                                action="{{ route('peminjaman.verifikasi', $peminjaman->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="btn btn-success btn-sm mt-2" disabled>
                                                                    <i class="fa fa-check d-inline mr-2"></i>
                                                                    Verifikasi Peminjaman
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form
                                                                action="{{ route('peminjaman.verifikasi', $peminjaman->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button class="btn btn-success btn-sm mt-2">
                                                                    <i class="fa fa-check d-inline mr-2"></i>
                                                                    Verifikasi Peminjaman
                                                                </button>
                                                            </form>
                                                        @endif

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
