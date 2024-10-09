<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCompany extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_job_company';
    /**
     * Get the job associated with this job-company relationship.
     */
    public function job()
    {
        return $this->belongsTo(Job::class, 'id_jobs', 'id_jobs');
    }

    /**
     * Get the company associated with this job-company relationship.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company', 'id_company');
    }
}
