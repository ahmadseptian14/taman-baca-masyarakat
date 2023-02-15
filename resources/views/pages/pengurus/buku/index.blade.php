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
                                                    <td>{{ $buku->judul }}</td>
                                                    <td>
                                                        <a href="{{ asset('storage/' . $buku->foto) }}" target="_blank">
                                                            <img src="{{ Storage::url($buku->foto) }}" width="50"
                                                                height="50" class="rounded-square">
                                                        </a>
                                                    </td>
                                                    <td>{{ $buku->penulis }}</td>
                                                    <td>{{ $buku->penerbit }}</td>
                                                    <td>{{ $buku->isbn }}</td>
                                                    <td>{{ $buku->stok_tersedia }}</td>
                                                    <td>{{ $buku->stok_pinjam }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary mb-2 btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#tambahBuku-{{ $buku->id }}">
                                                            <i class="fa fa-plus"></i>
                                                            Tambah
                                                        </button>
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#kurangBuku-{{ $buku->id }}">
                                                            <i class="fa fa-minus"></i>
                                                            Kurang
                                                        </button>
                                                        <br>
                                                        <a href="{{route('buku.edit', $buku->id)}}" class="btn-sm btn-info btn mt-2"><i class="fa fa-pencil"></i> Edit</a>
                                                        <br>
                                                        <form action="{{ route('buku.destroy', $buku->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger mt-2 btn-sm ">
                                                                <i class="fa fa-trash"></i> Hapus
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

    {{-- Modal tambah buku --}}
    <div class="modal fade" id="tambahBuku-{{ $buku->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('buku.tambah', $buku->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="stok_tersedia">Jumlah Buku yang akan di tambah</label>
                            <input type="number" name="stok_tersedia" id="stok_tersedia" class="form-control">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Buku</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal kurang buku --}}
    <div class="modal fade" id="kurangBuku-{{ $buku->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kurang Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('buku.kurang', $buku->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="stok_tersedia">Jumlah Buku yang akan di kurang</label>
                            <input type="number" name="stok_tersedia" id="stok_tersedia" class="form-control">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kurang Buku</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('addon-scripts')
    {{-- <script>
    $(document).ready(function() {
        $('.increment-btn').click(function(e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 99);
            value = isNaN(value) ? 0 : value;
            if (value < 99) {
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }

        });

        $('.decrement-btn').click(function(e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });
    });
</script> --}}
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
