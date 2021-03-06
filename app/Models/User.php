<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'sex',
        'age',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function nice()
    {
        return $this->hasMany(Nice::class);
    }

    public function joinNicesPosts()
    {
        return $this->hasManyThrough(
            'App\Models\Post',
            'App\Models\Nice',
            'user_id',
            'id',
            null,
            'post_id',
        );
    }

    public function joinCommentsPosts()
    {
        return $this->hasManyThrough(
            'App\Models\Post',
            'App\Models\Comment',
            'user_id',
            'id',
            null,
            'post_id',
        );
    }
}
