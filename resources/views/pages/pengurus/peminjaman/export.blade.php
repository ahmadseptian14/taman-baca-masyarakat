<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> --}}
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Laporan Peminjaman Buku</title>

  <style type="text/css">
    .thead{
    background-color: #3B82F6;
    color: #ffffff;
    }

    table tr td,
		table tr th{
			font-size: 9pt;
		}
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
  {{-- <div class="container mt-5">

  </div> --}}
  <div class="title text-center mb-5">
    <h2>Laporan Peminjaman Buku</h2>
  </div>
  <table class="table table-bordered">
    <thead class="thead">
      <tr>
        <th >No</th>
        <th >Nama</th>
        <th >Judul Buku</th>
        <th >Nama TBM</th>
        <th >Kode Peminjaman</th>
        <th >Tanggal Pinjam</th>
        <th >Tanggal Kembali</th>
        <th >Jumlah Pinjam</th>
        <th >Status Peminjaman</th>
      </tr>
    </thead>
    <tbody>
      @foreach($peminjamans as $peminjaman)
      <tr>
        <td>{{$loop->iteration}} </td>
        <td>{{ $peminjaman->user->name }}</td>
        <td>{{ $peminjaman->buku->judul }}</td>
        <td>{{ $peminjaman->buku->tbm->nama_tbm }}</td>
        <td>{{ $peminjaman->kode_peminjaman }}</td>
        <td>{{ $peminjaman->tgl_pinjam }}</td>
        <td>{{ $peminjaman->tgl_kembali }}</td>
        <td>{{ $peminjaman->jumlah_pinjam }}</td>
        <td>{{ $peminjaman->status_peminjaman }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
