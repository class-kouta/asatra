<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'update_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function nices()
    {
        return $this->hasMany(Nice::class);
    }

    public function notifications()
    {
        return $this->morphMany('App\Models\Notification', 'notificationable');
    }

    // うまく値が送信されないため削除
    // public function isNicedBy(?User $user): bool
    // {
    //     return $user
    //         ? (bool)$this->nices->where('id', $user->id)->count()
    //         : false;
    // }

    // レッスン６。一旦コメントアウト。
    public function getCountNicesAttribute(): int
    {
        return $this->nices->count();
    }
}
