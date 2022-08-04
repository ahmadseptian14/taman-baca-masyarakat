<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbm extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id', 'nama_tbm', 'deskripsi'
    ];

    protected $table = 'tbm';

    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function books () {
        return $this->hasMany(Buku::class, 'users_id', 'id');
    }
}
