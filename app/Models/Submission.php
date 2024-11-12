<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $table = 'submissions'; // Nama tabel
    protected $primaryKey = 'submission_code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'submission_code',
        'submitter_id',
        'nip_reviewer',
        'status',
        'submission_title',
        'problem_description',
        'application_purpose',
        'business_process',
        'business_rules',
        'stakeholders',
        'platform',
        'review_date',
        'review_description',
        'project_type',
    ];

    public function submitter()
    {
        return $this->belongsTo('App\Models\Submitter', 'submitter_id');
    }

    public function reference()
    {
        return $this->hasMany(Reference::class, 'submission_code');
    }

    public function review()
    {
        return $this->hasOne('App\Models\Review', 'submission_code');
    }

    public function reviewer()
    {
        return $this->belongsTo('App\Models\Reviewer', 'nip_reviewer');
    }
}
