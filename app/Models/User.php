<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['username', 'nip', 'is_admin'];

    // Relasi jika ada tabel lain yang terkait
    public function pegawai()
    {
        return $this->hasOne(Pegawai::class); // Contoh relasi ke tabel pegawai
    }
}