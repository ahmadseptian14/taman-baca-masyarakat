<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'kategori_id', 'tbm_id', 'judul', 'penulis', 'status_buku'
    ];

    protected $table = 'buku';

    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function tbm() {
        return $this->belongsTo(Tbm::class, 'tbm_id', 'id');
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
