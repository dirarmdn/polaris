<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaju extends Model
{
    use HasFactory;

    protected $table = 'pengajus'; // Nama tabel
    protected $fillable = [
        'user_id',
        'kode_organisasi',
        'jabatan',
    ];

    // Relasi dengan model Organisasi (Many to One)
    public function organisasi()
    {
        return $this->belongsTo('App\Models\Organisasi', 'kode_organisasi');
    }

    // Relasi dengan model Pengajuan (One to Many)
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
