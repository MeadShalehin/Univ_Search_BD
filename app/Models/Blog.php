<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Tags\HasTags;

class Blog extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    // use HasTags;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    public function image()
    {
        return $this->morphOne(Image::class, 'parentable')->oldestOfMany();
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'parentable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likers()
    {
        return $this->belongsToMany(User::class, 'user_blog_likes', 'blog_id', 'user_id');
    }
    
}
