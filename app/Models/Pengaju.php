<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaju extends Model
{
    use HasFactory;

    protected $table = 'pengajus'; // Nama tabel
    protected $primaryKey = 'id_pengaju';
    public $incrementing = true;

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
        return $this->belongsTo('App\Models\Organisasi', 'kode_organisasi');
    }

    // Relasi dengan model Pengajuan (One to Many)
    public function pengajuans()
    {
        return $this->hasMany('App\Models\Pengajuan', 'id_pengaju');
    }
}
