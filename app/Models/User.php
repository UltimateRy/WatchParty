<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function follows()
    {
        return $this->belongsToMany(User::class, "user_follows", 'user_id', 'follow_id');
    }

    public function followedBy()
    {
        return  $this->belongsToMany(User::class, 'user_follows', 'follow_id', 'user_id');
    }

    public function isFollowing(User $user)
    {
        return !! $this->following()->where('following_id', $user->id)->count();
    }

    public function follow(User $user)
    {
        $this->follows()->attach($user->id);
    }

    public function unfollow(User $user)
    {
        $this->follows()->detach($user->id);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
