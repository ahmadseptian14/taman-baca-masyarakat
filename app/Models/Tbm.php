<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbm extends Model
{
    use HasFactory;

    protected $fillable = [
         'nama_tbm', 'deskripsi', 'no_hp'
    ];

    protected $table = 'tbm';

    // public function user() {
    //     return $this->belongsTo(User::class, 'users_id', 'id');
    // }

    public function books () {
        return $this->hasMany(Buku::class, 'users_id', 'id');
    }

    public function users () {
        return $this->hasMany(User::class, 'users_id', 'id');
    }
}
