@extends('layouts.anggota')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Detail peminjaman</h2>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    @forelse ($peminjamans as $peminjaman)
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h4>Nama : {{$peminjaman->name}}</h4>
                                <h4>NIK : {{$peminjaman->user_nik}}</h4>
                                <h4>No.Telepon : {{$peminjaman->user->phone}}</h4>
                                <h4>Tanggal : {{ $peminjaman->created_at->format('l, d F Y - H:i:s') }}</h4>
                                <h4>Status : 
                                    @if($peminjaman->status =='Belum di Proses')
                                    <span class="badge badge-pill badge-danger">{{$peminjaman->status}}</span>

                                    @elseif ($peminjaman->status =='Sedang di Proses')
                                    <span class="badge badge-pill badge-primary">{{$peminjaman->status}}</span>
                                    @else

                                    <span
                                    <span class="badge badge-pill badge-success">{{$peminjaman->status}}</span>
                                    @endif
                                </h4>
                            </div>
                          
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h4 class="text-center">Keterangan</h4>
                                <p>{{$peminjaman->description}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h4 class="text-center">Tanggapan</h4>
                                @if (empty($tanggapan->tanggapan))
                                Belum ada tanggapan
                                @else
                                {{ $tanggapan   ->tanggapan}}
                                @endif
                            </div>
                            @empty
                            <h2>Tidak Ada peminjaman</h2>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            <a href="{{route('tanggapan.show', $peminjaman->id)}}" class="btn btn-primary btn-lg active">Berikan Tanggapan</a>
        </div>
    </div>
</div>
@endsection