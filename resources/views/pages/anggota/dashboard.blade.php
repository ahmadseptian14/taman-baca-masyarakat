@extends('layouts.anggota')

@section('content')
    <div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        @if (Auth::user()->roles == 'PENGURUS')
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h3>Buku</h3>
                    <h3>{{$buku_pengurus}}</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h3>Peminjaman</h3>
                    <h3>{{$peminjaman_pengurus}}</h3>
                </div>
            </div>
        </div>
        @endif
        
        @if (Auth::user()->roles == 'ADMIN')
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h3>Kategori Buku</h3>
                    <h3>{{$kategori}}</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h3>Buku</h3>
                    <h3>{{$buku}}</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h3>Peminjaman</h3>
                    <h3>{{$peminjaman}}</h3>
                </div>
            </div>
        </div>
       
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h3>TBM</h3>
                    <h3>{{$tbm}}</h3>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h3>Pengurus</h3>
                    <h3>{{$pengurus}}</h3>
                </div>
            </div>
        </div>
        @endif
       
    </div>
</div>
@endsection