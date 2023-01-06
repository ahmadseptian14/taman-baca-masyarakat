<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;

    protected $fillable = ['peminjaman_id', 'buku_id', 'pengurus_id', 'status_peminjaman', 'jumlah_pinjam'];

    protected $table = 'detail_peminjaman';

    public function user()
    {
        return $this->hasOne(user::class, 'id', 'pengurus_id');
    }

    public function buku()
    {
        return $this->hasOne(Buku::class, 'id', 'buku_id');
    }

    public function peminjaman()
    {
        return $this->hasOne(Peminjaman::class, 'id', 'peminjaman_id');
    }

}
