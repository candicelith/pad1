<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingRequest extends Model
{
    use HasFactory;
    protected $table = "pending_request";
    protected $primaryKey = 'id_request';

    protected $fillable = [
        'id_userDetails',
        'id_tracking',
        'id_company',
        'job_name',
        'job_description',
        'date_start',
        'date_end',
        'approval_status',
        'request_type'
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

    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company', 'id_company');
    }
}
