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

    public function userDetails()
    {
        return $this->belongsTo(UserDetails::class, 'id_userDetails', 'id_userDetails');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'id_jobs', 'id_jobs');
    }
}
