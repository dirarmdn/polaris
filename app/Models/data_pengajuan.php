<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $table = 'pengajuans'; // Opsional, hanya jika ingin eksplisit

    // Jika ada relasi ke tabel `users`, pastikan fungsi berikut ada:
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
