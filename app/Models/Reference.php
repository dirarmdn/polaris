<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reference extends Model
{
    use HasFactory;

    protected $primaryKey = 'reference_id';

    protected $fillable = [
        'submission_code',
        'description',
        'type',
        'path',
    ];
    
    public $incrementing = true;
    public function submission()
    {
        return $this->belongsTo(Submission::class, 'submission_code');
    }
}