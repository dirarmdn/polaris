<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submitter extends Model
{
    //
    use HasFactory;

    protected $table = 'submitters';

    protected $fillable = [
        'user_id',
        'position_in_organization',
        'organization_code'
    ];

    public $incrementing = true;

    protected $primaryKey = 'submitter_id';


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_code');
    }

    public function submission()
    {
        return $this->hasMany(Submission::class, 'submitter_id');
    }
}
