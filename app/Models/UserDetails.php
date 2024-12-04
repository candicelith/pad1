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
        'phone',
        'graduate_year',
        'user_description',
        'current_company',
        'current_job',
        'profile_photo',
        'modifiedBy',
        'modifiedDate',
        'status'
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

    public function getProfilePictureAttribute()
    {
        // Check if profile_photo exists and is not empty
        if (!empty($this->attributes['profile_photo'])) {
            return asset('storage/profile/' . $this->attributes['profile_photo']);
        }

        // Return the default profile picture URL
        return 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png';
    }

}
