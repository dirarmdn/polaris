<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $table = 'organizations';
    public $incrementing = false;
    protected $primaryKey = 'organization_code';
    protected $keyType = 'string';

    protected $fillable = [
        'organization_code',
        'organization_name',
        'company_description',
        'address',
        'website',
        'business_field',
        'logo'      
    ];

    public function submitter() {
        return $this->hasMany(Submitter::class, 'organization_code');
    }
}
