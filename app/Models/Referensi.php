<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Referensi extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'keterangan',
        'tipe',
        'path',
    ];
    public $incrementing = true;
    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'kode_pengajuan');
    }
}