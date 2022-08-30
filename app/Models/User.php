<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tbm_id',
        'name',
        'email',
        'password',
        'roles',
        'no_hp'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function books () {
        return $this->hasMany(Buku::class, 'users_id', 'id');
    }

    // public function tbms () {
    //     return $this->hasMany(Tbm::class, 'users_id', 'id');
    // }

    public function tbm() {
        return $this->belongsTo(Tbm::class, 'users_id', 'id');
    }


    public function peminjamans () {
        return $this->hasMany(Peminjaman::class, 'users_id', 'id');
    }
}

