<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'm_pegawai'; // Nama tabel sesuai dengan database Anda

    protected $fillable = [
        'nip', 'nama', 'user_id', 'is_admin', 
    ];
}
