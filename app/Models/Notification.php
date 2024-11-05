<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'user_id',
        'isRead',
        'message'
    ];

    public $incrementing = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
