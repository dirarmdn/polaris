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
        'kode_organisasi',
        'nama',
        'deskripsi_perusahaan',
        'alamat',
        'website',
        'bidang_usaha',
        'logo'      
    ];

    // Relasi dengan model User (One to Many)
    public function user()
    {
        return $this->hasMany('App\Models\User', 'kode_organisasi');
    }
}
