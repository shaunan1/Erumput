<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'warga'; // Sesuaikan dengan nama tabel di database
    protected $fillable = ['nama', 'alamat', 'tanggal_lahir']; // Sesuaikan dengan kolom di tabel
}
