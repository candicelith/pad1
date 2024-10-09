<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    use HasFactory;

    protected $table = 'user_details';

    protected $primaryKey = 'id_userDetails';

    protected $fillable = [
        'id_users',
        'name',
        'nim',
        'email',
        'phone',
        'graduate_year',
        'profile_picture',
        'isAlumni',
        'modifiedBy',
        'modifiedDate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users','id_users');
    }

    public function jobTrackings()
    {
        return $this->hasOne(JobTracking::class, 'id_users', 'id_users');
    }
}
