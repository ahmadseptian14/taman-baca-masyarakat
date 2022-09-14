@extends('layouts.anggota')

@push('addon-styles')
    
@endpush
@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Pinjam Buku</h2>
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
                                <form action="{{ route('peminjaman.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input type="text" name="users_id" class="form-control" value="{{Auth::user()->id}}" hidden>
                                        <input type="text" name="buku_id" class="form-control" value="{{$buku->id}}" hidden>
                                        <input type="text" name="buku_pengurus" class="form-control" value="{{$buku->users_id}}" hidden>
                                        <div class="list-group">
                                            <a class="list-group-item list-group-item-action">
                                              <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Judul Buku</h5>
                                              </div>
                                              <p class="mb-1">{{$buku->judul}}</p>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                  <h5 class="mb-1">Foto Buku</h5>
                                                </div>
                                                <img src="{{Storage::url($buku->foto)}}" width="50" height="50" class="rounded-square">
                                              </a>
                                            <a class="list-group-item list-group-item-action">
                                              <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Penulis</h5>
                                              </div>
                                              <p class="mb-1">{{$buku->penulis}}</p>
                                            </a>
                                            <a  class="list-group-item list-group-item-action">
                                              <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Penerbit</h5>
                                              </div>
                                              <p class="mb-1">{{$buku->penerbit}}</p>
                                            </a>
                                            <a class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                  <h5 class="mb-1">TBM</h5>
                                                </div>
                                                <p class="mb-1">{{$buku->tbm->nama_tbm}}</p>
                                              </a>
                                              <a class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                  <h5 class="mb-1">TBM</h5>
                                                </div>
                                                <p class="mb-1">{{$buku->tbm->nama_tbm}}</p>
                                              </a>
                                              <a class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                  <h5 class="mb-1">Kategori</h5>
                                                </div>
                                                <p class="mb-1">{{$buku->kategori->nama_kategori}}</p>
                                              </a>
                                          </div>
                                          <div class="col-md-12">
                                            <div class="form-group">
                                                <h5 class="mb-1 mt-2">Tanggal Pinjam</h5>
                                                <input  type="text" name="tgl_pinjam" class="form-control" id="datepicker" width="312">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-success px-5 mb-3">
                                        Pinjam Buku
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

@push('addon-scripts')
<script>
   var today, datepicker;
   today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
   datepicker = $('#datepicker').datepicker({
       minDate: today
   });
</script>

@endpush
