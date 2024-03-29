@extends('layouts.anggota')

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Edit Buku</h2>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <input type="text" name="tbm_id" class="form-control" value="{{Auth::user()->tbm_id}}" hidden>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select name="kategori_id" id="kategori_id" class="form-control select2">
                                                    <option value="{{$buku->kategori_id}}" selected>--{{ $buku->kategori->nama_kategori }}--</option>
                                                    @foreach ($kategoris as $kategori)
                                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input type="text" name="judul" class="form-control" required value="{{$buku->judul}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Foto</label> <br>
                                                <img src="{{Storage::url($buku->foto)}}" alt="" width="100" class="mb-2">
                                                <input type="file" name="foto" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Penulis</label>
                                                <input type="text" name="penulis" class="form-control" required value="{{$buku->penulis}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Penerbit</label>
                                                <input type="text" name="penerbit" class="form-control" required value="{{$buku->penerbit}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nomor ISBN</label>
                                                <input type="text" name="isbn" class="form-control" required value="{{$buku->isbn}}" >
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Stok Buku</label>
                                                <input type="number" name="stok_tersedia" class="form-control" required value="{{$buku->stok_tersedia}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('addon-stack')
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
    @endpush
