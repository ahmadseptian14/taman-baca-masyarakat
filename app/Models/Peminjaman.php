<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'buku_id', 'buku_pengurus', 'tgl_pinjam', 'tgl_kembali', 'status_peminjaman'
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
}
