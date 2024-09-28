<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'nip',
        'kode_organisasi',
        'nama',
        'password',
        'role'
    ];

    // Relasi dengan model Organisasi (Many to One)
    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'kode_organisasi');
    }
}
