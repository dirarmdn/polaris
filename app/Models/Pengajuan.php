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
    protected $keyType = 'string';

    protected $fillable = [
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
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function referensi()
    {
        return $this->hasMany(Referensi::class, 'kode_pengajuan');
    }
}
