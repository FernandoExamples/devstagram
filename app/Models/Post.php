<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'user_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'name', 'username', 'email']);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }

    public function checkLike(User $user)
    {
        return $this->likes()->wherePivot('user_id', $user->id)->count() > 0;
    }

    public function isMyPost() {
        return $this->user_id == auth()->user()->id;
    }
}
