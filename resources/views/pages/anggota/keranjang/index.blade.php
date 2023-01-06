@extends('layouts.anggota')

@push('addon-styles')
    <style>
        .disable {
            pointer-events: none;
        }
    </style>
@endpush
@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Keranjang</h2>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-borderless" aria-describedby="Cart">
                                    <thead>
                                        <tr>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Judul Buku</th>
                                            <th scope="col">Penulis</th>
                                            <th scope="col">Penerbit</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $totalBuku = 0 @endphp
                                        @forelse ($keranjangs as $keranjang)
                                            <tr>
                                                <td style="width: 25%;">
                                                    @if ($keranjang->buku->foto)
                                                        <img src="{{ Storage::url($keranjang->buku->foto) }}" alt=""
                                                            class="cart-image" width="55%" />
                                                    @endif
                                                </td>
                                                <td style="width: 20%;">
                                                    <div class="product-title">{{ $keranjang->buku->judul }}</div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <div class="product-title">{{ $keranjang->buku->penulis }}</div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <div class="product-title">{{ $keranjang->buku->penerbit }}</div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <div class="product-title">{{ $keranjang->jumlah_pinjam }}</div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <form action="{{ route('keranjang.delete', $keranjang->id) }}"
                                                        method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger delete"
                                                            onclick="return confirm_delete()">Hapus</button>
                                                    </form>

                                                </td>
                                            </tr>
                                            @php $totalBuku += $keranjang->jumlah_pinjam @endphp
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Tidak Ada peminjaman</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="row">

                                    <div class="row mt-3">
                                        <div class="col text-right form-group">
                                            @if (!empty($keranjang))
                                            <a id="set_dtl" class="btn px-5 btn-success" data-bs-toggle="modal"
                                            data-bs-target="#detail_peminjaman"
                                            @foreach ($keranjangs as $keranjang)
                                            data-nama="{{$keranjang->user->name}}"
                                            data-email="{{$keranjang->user->email}}"
                                            data-no_hp="{{$keranjang->user->no_hp}}"
                                            data-tbm="{{$keranjang->buku->tbm->nama_tbm}}"
                                            data-isbn="{{$keranjang->buku->isbn}}"
                                            data-judul="{{$keranjang->buku->judul}}"
                                            data-total_buku="{{$totalBuku}}"
                                            @endforeach
                                            >Pinjam</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal" tabindex="-1" id="detail_peminjaman">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered no-margin">
                        <tbody>
                            <tr>
                                <th>Nama Peminjam</th>
                                <td><span id="nama"></span></td>
                            </tr>
                            <tr>
                                <th>Nama Email</th>
                                <td><span id="email"></span></td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td><span id="no_hp"></span></td>
                            </tr>

                        </tbody>
                    </table>
                    <table class="table table-bordered no-margin">
                        <thead>
                            <th>Judul Buku</th>
                            <th>No ISBN</th>
                            <th>TBM</th>
                            <th>Jumlah</th>
                        </thead>
                        <tbody>
                            @foreach ($keranjangs as $keranjang)
                            <tr>
                                <td><span id="tbm">{{$keranjang->buku->tbm->nama_tbm}}</span></td>
                                <td><span id="isbn">{{$keranjang->buku->isbn}}</span></td>
                                <td><span id="judul">{{$keranjang->buku->judul}}</span></td>
                                <td><span id="judul">{{$keranjang->jumlah_pinjam}}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form action="{{ route('peminjaman.store') }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    @if (!empty($keranjang))
                        <div class="col-4">
                            <div class="form-group">
                                <h5 class="mb-1 mt-2">Tanggal Pinjam</h5>
                                <input type="text" name="tgl_pinjam" class="form-control"
                                    id="tanggal_pinjam" width="312">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <h5 class="mb-1 mt-2">Tanggal Kembali</h5>
                                <input type="text" name="tgl_kembali" class="form-control"
                                    id="tanggal_kembali" width="312">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <h5 class="mb-1 mt-2">Total Buku</h5>
                                <p>{{$totalBuku}}</p>
                            </div>
                        </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary" onclick="return confirm_setuju()">Konfirmasi</button>
                    </div>
                </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('addon-scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script> --}}

    {{-- Konfirmasi hapus buku dikeranjang --}}
    <script type="text/javascript">
        function confirm_delete() {
            return confirm("Apakah yakin akan menghapus buku ini?");
        }

        function confirm_setuju() {
            return confirm("Apakah yakin akan meminjam buku ini?");
        }
    </script>

    {{-- Modal detail peminjaman --}}
    <script type="text/javascript">
        $(document).on('click', '#set_dtl', function() {
            var nama = $(this).data('nama');
            var email = $(this).data('email');
            var no_hp = $(this).data('no_hp');
            // var tbm = $(this).data('tbm');
            // var isbn = $(this).data('isbn');
            // var judul = $(this).data('judul');
            $('#nama').text(nama);
            $('#email').text(email);
            $('#no_hp').text(no_hp);
            // $('#tbm').text(tbm);
            // $('#isbn').text(isbn);
            // $('#judul').text(judul);
        })
    </script>


    {{-- Tangggal Pinjam --}}
    <script>
        var today, datepicker;
        today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        datepicker = $('#tanggal_pinjam').datepicker({
            minDate: today
        });
    </script>

    {{-- Tanggal Kembali --}}
    <script>
        var today, datepicker;
        today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        datepicker = $('#tanggal_kembali').datepicker({
            minDate: today
        });
    </script>
@endpush
