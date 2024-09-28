<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaju extends Model
{
    use HasFactory;    use HasFactory;

    protected $table = 'pengajus'; // Nama tabel

    protected $fillable = [
        'kode_organisasi',
        'nama_pengaju',
        'email_pengaju',
        'jabatan',
        'no_telp'
    ];

    // Relasi dengan model Organisasi (Many to One)
    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'kode_organisasi');
    }

    // Relasi dengan model Pengajuan (One to Many)
    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class, 'id_pengaju');
    }
}
