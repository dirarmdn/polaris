<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reviewer extends Model
{
    //
    use HasFactory;

    protected $table = 'reviewers';

    protected $fillable = [
        'user_id',
        'nip_reviewer',
        'isActive',
        'review_total'
    ];

    protected $primaryKey = 'nip_reviewer';
    public $incrementing = false;
    protected $keyType = 'string';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function submission()
    {
        return $this->hasMany(Submission::class, 'nip_reviewer');
    }
}
