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

    // User Accessor
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users','id_users');
    }

    // Job Tracking Accessor
    public function jobTrackings()
    {
        return $this->hasOne(JobTracking::class, 'id_users', 'id_users');
    }

    // Profile Picture Accessor
    public function getProfilePictureAttribute($value)
    {
        return $value ?? 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png';
    }
}
