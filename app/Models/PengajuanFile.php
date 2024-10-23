<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanFile extends Model
{
    use HasFactory;

    protected $fillable = ['pengajuan_id', 'file_path'];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id', 'kode_pengajuan');
    }
}