@extends('layouts.anggota')

@push('addon-styles')
    <style>
        .disable{
            pointer-events: none;
        }
    </style>
@endpush
@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Buku</h2>
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
                                                <th>TBM</th>
                                                <th>Kategori</th>
                                                <th>Judul</th>
                                                <th>Foto</th>
                                                <th>Penulis</th>
                                                <th>Penerbit</th>
                                                <th>Nomor ISBN</th>
                                                <th>Stok Tersedia</th>
                                                <th>Stok yang dipinjam</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($bukus as $buku)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $buku->tbm->nama_tbm}}</td>
                                                    <td>{{ $buku->kategori->nama_kategori }}</td>
                                                    <td>{{ $buku->judul}}</td>
                                                    <td>
                                                        <a href="{{asset('storage/'. $buku->foto)}}" target="_blank">
                                                            <img src="{{Storage::url($buku->foto)}}" width="50" height="50" class="rounded-square">
                                                        </a>
                                                    </td>
                                                    <td>{{ $buku->penulis}}</td>
                                                    <td>{{ $buku->penerbit}}</td>
                                                    <td>{{ $buku->isbn}}</td>
                                                    <td>{{ $buku->stok_tersedia}}</td>
                                                    @if (empty($buku->stok_pinjam))
                                                        <td>Belum ada yang pinjam</td>
                                                    @else
                                                        <td>{{ $buku->stok_pinjam}}</td>
                                                    @endif
                                                    @if ($buku->stok_tersedia == 0)
                                                    <td>
                                                        <a href="{{route('peminjaman.create', $buku->id)}}" class="btn btn-secondary btn-sm disable"><i class="fa fa-pencil-alt d-inline"></i>Pinjam</a>
                                                        
                                                    </td>
                                                    @else
                                                         <td>
                                                        <a href="{{route('peminjaman.create', $buku->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil-alt d-inline"></i>Pinjam</a>
                                                        
                                                    </td>
                                                    @endif
                                                   
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
