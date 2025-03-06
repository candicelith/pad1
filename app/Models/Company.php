<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company';
    protected $primaryKey = 'id_company';

    public function jobs()
    {
        return $this->hasMany(Job::class, 'id_company', 'id_company');
    }

    public function getCompanyPictureAttribute($value)
    {
        return $value ?? 'https://picsum.photos/id/870/200/300?grayscale&blur=2';
    }
}
