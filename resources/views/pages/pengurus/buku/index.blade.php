@extends('layouts.anggota')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title"></h2>
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
                                                <th>Stok Pinjam</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($bukus as $buku)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $buku->tbm->nama_tbm }}</td>
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
                                                    <td>{{ $buku->stok_pinjam}}</td>

                                                    <td>
                                                        {{-- <a href="{{route('member.edit', $item->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil-alt d-block"></i>Edit Data</a> --}}
                                                        <form action="{{ route('buku.destroy', $buku->id) }}"
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
                                                    <td colspan="7" class="text-center">Tidak Ada Buku</td>
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
