<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'buku_id','tgl_pinjam', 'tgl_kembali', 'status_peminjaman', 'jumlah_pinjam', 'no_peminjaman'
    ];

    protected $table = 'peminjaman';

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }

    public function detail_peminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class, 'peminjaman_id', 'id');
    }
    
}
