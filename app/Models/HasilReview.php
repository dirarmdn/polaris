<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HasilReview extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'hasil_reviews';

    protected $fillable = [
        'deskripsi_review',
    ];

    // Relasi dengan model Organisasi (Many to One)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function review()
    {
        return $this->belongsTo(Pengajuan::class,'kode_pengajuan');
    }
}
