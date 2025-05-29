<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostRegistration;

class Vacancy extends Model
{
    use HasFactory;

    protected $table = 'vacancy';

    protected $primaryKey = 'id_vacancy';

    protected $fillable = [
        'id_company',
        'id_users',
        'position',
        'vacancy_description',
        'date_open',
        'date_closed',
        'vacancy_picture',
        'vacancy_link',
        'vacancy_qualification',
        'vacancy_responsibilities',
        'vacancy_benefits'
    ];

    protected $casts = [
        'vacancy_qualification' => 'array',
        'vacancy_responsibilities' => 'array',
        'vacancy_benefits' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'id_vacancy','id_vacancy');
    }

    public function registrations()
    {
        return $this->hasMany(PostRegistration::class, 'vacancy_id', 'id_vacancy');
    }


// Accessor for vacancy_picture
public function getVacancyPictureAttribute($value)
{
    if ($value) {
        // If $value already starts with 'vacancies/', don't prepend 'profile/' again
        if (str_starts_with($value, 'vacancies/')) {
            return asset('storage/' . $value);
        }

        // If your stored path is just a filename, prepend 'profile/'
        return asset('storage/profile/' . $value);
    }

    return asset('assets/default-vacancy.jpg');
}

}
