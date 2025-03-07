<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $primaryKey = 'id_comment';

    protected $fillable = [
        'id_vacancy',
        'id_users',
        'text_comment',
        'parent_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class,'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class,'parent_id')
            ->orderBy('created_at','asc');
    }
    /**
     * Get the vacancy that owns the comment
     */
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'id_vacancy', 'id_vacancy');
    }
     /**
     * Get the created_at attribute as a human-readable string
     */
    public function getCreatedAtHumanAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
