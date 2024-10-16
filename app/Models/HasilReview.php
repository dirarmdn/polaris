<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HasilReview extends Model
{
    use HasFactory;

    protected $table = 'hasil_reviews';

    protected $fillable = [
        'nip',
        'deskripsi_review',
        'kode_pengajuan'
    ];

    // Relasi dengan model Organisasi (Many to One)
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'nipS');
    }
    public function review()
    {
        return $this->belongsTo(HasilReview::class,'kode_pengajuan');
    }
}
