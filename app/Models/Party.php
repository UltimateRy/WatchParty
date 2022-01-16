<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    public function host()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, "party_users", 'party_id', 'user_id');
    }
    
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function addToParty(User $user) {

        $this->users()->attach($user->id);

    }

    public function hasUser($user_id)
    {
        $party_users = $this->users;

        foreach ($party_users as $user) {
            if($user->id == $user_id) {
                return true;
            }
        }
        
        return false;
    }
}
