<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_users',
        'type',
        'message',
        'is_read'
    ];

    public function userDetails()
    {
        $this->belongsTo(User::class,'id_users','id_users');
    }
}
