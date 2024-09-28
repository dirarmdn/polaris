<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $table = 'organisasis'; // Nama tabel

    protected $fillable = [
        'kode_organisasi',
        'nama'
    ];

    // Relasi dengan model Pengaju (One to Many)
    public function pengajus()
    {
        return $this->hasMany(Pengaju::class, 'kode_organisasi');
    }

    // Relasi dengan model Admin (One to Many)
    public function admins()
    {
        return $this->hasMany(Admin::class, 'kode_organisasi');
    }
}
