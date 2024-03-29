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
        return !! $this->follows()->where('follow_id', $user->id)->count();
    }

    public function isFollowedBy(User $user) {

        return !! $user->follows()->where('follow_id', $this->id)->count();

    }

    public function follow(User $user)
    {
        $this->follows()->attach($user->id);
    }

    public function unfollow(User $user)
    {
        $this->follows()->detach($user->id);
    }

    public function parties() 
    {
        return $this->belongsToMany(Party::class, "party_users", 'user_id', 'party_id');
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
        'last_seen',
        'activity',
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
