<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $table = 'organisasis';
    public $incrementing = false;
    protected $primaryKey = 'kode_organisasi';
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'deskripsi_perusahaan',
        'alamat',
        'website',
        'bidang_usaha',
        'logo'      
    ];

    // Relasi dengan model Pengaju (One to Many)
    public function pengajus()
    {
        return $this->hasMany('App\Models\Pengaju', 'kode_organisasi');
    }
}
