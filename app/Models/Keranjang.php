<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $fillable = [
        'buku_id', 'users_id', 'jumlah_pinjam'
    ];

    public function buku()
    {
        return $this->hasOne(Buku::class, 'id', 'buku_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
