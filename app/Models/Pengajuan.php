<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuans'; // Nama tabel
    protected $primaryKey = 'kode_pengajuan';
    public $incrementing = false;

    protected $fillable = [
        'kode_pengajuan',
        'id_pengaju',
        'isVerified',
        'judul_pengajuan',
        'deskripsi_masalah',
        'tujuan_aplikasi',
        'proses_bisnis',
        'aturan_bisnis',
        'platform',
        'jenis_proyek',
        'stakeholder'
    ];

    // Relasi dengan model Pengaju (Many to One)
    public function pengaju()
    {
        return $this->belongsTo('App\Models\Pengaju', 'id_pengaju');
    }
}
