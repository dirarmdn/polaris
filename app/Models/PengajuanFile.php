<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanFile extends Model
{
    use HasFactory;

    protected $fillable = ['kode_pengajuan', 'file_path'];
    public $incrementing = true;
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'kode_pengajuan');
    }
}