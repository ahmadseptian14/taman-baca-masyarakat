<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id','pengurus_id', 'buku_id','tgl_pinjam', 'tgl_kembali', 'status_peminjaman', 'jumlah_pinjam', 'kode_peminjaman'
    ];

    protected $table = 'peminjaman';

    public function user()
    {
        return $this->hasOne(user::class, 'id', 'users_id');
    }

    public function buku()
    {
        return $this->hasOne(Buku::class, 'id', 'buku_id');
    }

    public function detail_peminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class, 'peminjaman_id', 'id');
    }

}
