<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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


    // Accessor for vacancy_picture
    public function getVacancyPictureAttribute($value)
    {
        return $value ?? 'assets\default-vacancy.jpg';
    }
}
