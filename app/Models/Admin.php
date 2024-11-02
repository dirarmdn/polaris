<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama',
        'email',
        'password',
        'role',
        'no_telp'
    ];

    // Relasi dengan model Organisasi (Many to One)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}

