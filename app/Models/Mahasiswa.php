<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    
    // Tentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'mahasiswa';

    // Kolom-kolom yang bisa diisi secara massal
    protected $fillable = [
        'nim', 
        'nama', 
        'prodi_id', 
        'email', 
        'nomor_hp', 
        'jenis_kelamin', 
        'tempat_lahir', 
        'tanggal_lahir', 
        'golongan_darah'
    ];
}
