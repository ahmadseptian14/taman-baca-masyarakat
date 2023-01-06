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
                <h2 class="dashboard-title">Profile</h2>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <h5>Foto Profile</h5>
                                        <div class="card" style="width: 18rem;">
                                            <img src="{{ asset(Auth::user()->foto) }}" width="100" height="380"
                                                class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $user->name }}</h5>
                                                <form action="{{route('user.update-foto')}}" enctype="multipart/form-data" method="POST">
                                                    @method('put')
                                                    @csrf
                                                    <input type="file" class="form-control mb-2" name="foto" required>
                                                    <button type="submit" class="btn btn-sm btn-success">Ubah Foto</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5>Ubah Password</h5>
                                        <div class="card">
                                            <div class="card-body">
                                               <form action="{{route('edit.password')}}" method="POST" enctype="multipart/form-data">
                                                @method('put')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="current_password">Password Saat ini</label>
                                                                <input type="password" name="current_password" class="form-control" id="current_password">
                                                                @error('current_password')
                                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="password">Password Baru</label>
                                                                <input type="password" name="password" class="form-control" id="password">
                                                                @error('password')
                                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="password_confirmation">Password Konfirmasi</label>
                                                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                                                                @error('password_confirmation')
                                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
