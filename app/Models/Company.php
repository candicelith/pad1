<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company';
    protected $primaryKey = 'id_company';

    protected $fillable = [
        'company_name',
        'company_field',
        'company_phone',
        'company_email',
        'company_website',
        'company_address',
        'company_description',
        'company_picture',
        'status',
        'rejection_reason',
        'company_gallery',
        'creator'
    ];

    protected $casts = [
        'company_gallery' => 'array',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'id_company', 'id_company');
    }

    public function workers()
    {
        return $this->hasManyThrough(
            UserDetails::class,
            JobTracking::class,
            'id_company',
            'id_userDetails',
            'id_company',
            'id_userDetails'
        );
    }

    // public function getCompanyPictureAttribute($value)
    // {
    //     return $value
    //     ? asset('storage/company/' . ltrim($value, '/'))
    //     : asset(ltrim('assets/default-company.png', '/'));
    // }
}
