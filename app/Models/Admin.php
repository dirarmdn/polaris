<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    //
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'user_id',
        'nip'
    ];

    protected $primaryKey = 'nip';
    public $incrementing = false;
    protected $keyType = 'string';


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
