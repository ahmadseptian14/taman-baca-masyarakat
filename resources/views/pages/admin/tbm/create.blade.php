@extends('layouts.anggota')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Tambah TBM</h2>
    </div>
    <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>   
            @endif
                <div class="card">
                    <div class="card-body">
                       <form action="{{route('tbm.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                              
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama TBM</label>
                                        <input type="text" name="nama_tbm" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <input type="text" name="deskripsi" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>No.Telepon</label>
                                        <input type="text" name="no_hp" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-success px-5">
                                        Simpan
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