<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostRegistration extends Model
{
    use HasFactory;

    protected $table = 'post_registrations';

    protected $fillable = [
        'vacancy_id',
        'user_id',
        'cv',
        'status'
    ];

    // Relationships
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id', 'id_vacancy');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_users');
    }
}
