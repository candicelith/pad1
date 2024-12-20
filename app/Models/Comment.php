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
        'id_users',
        'text_comment',
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
        return $this->hasMany(Comment::class,'parent_id');
    }
}
