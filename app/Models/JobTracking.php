<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTracking extends Model
{
    use HasFactory;

    protected $table = 'job_tracking';

    protected $primaryKey = 'id_tracking';

    protected $fillable = [
        'id_userDetails',
        'id_jobs',
        'date_start',
        'date_end',
        // 'status',
        // 'type',
        'job_description'
    ];

    protected $casts = [
        'job_description' => 'array',
        'date_start' => 'datetime',
        'date_end' => 'datetime'
    ];


    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_tracking_jobs', 'job_tracking_id', 'job_id');
    }

    public function userDetails()
    {
        return $this->belongsTo(UserDetails::class, 'id_users', 'id_users');
    }

    public function isTheCurrentJob()
    {

    }
}
