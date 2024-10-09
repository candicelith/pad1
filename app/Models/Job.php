<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_jobs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_name',
        'job_description',
        'job_role',
    ];

    /**
     * Get the company that owns the job.
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company', 'id_company');
    }

    public function jobTrackings()
    {
        return $this->belongsToMany(JobTracking::class, 'job_tracking_jobs', 'job_id', 'job_tracking_id');
    }
}
