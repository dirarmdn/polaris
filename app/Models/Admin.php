<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';
    protected $primaryKey = 'nip';

    protected $fillable = [
        'nip',
        'user_id',
    ];

    // Relasi dengan model Organisasi (Many to One)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
