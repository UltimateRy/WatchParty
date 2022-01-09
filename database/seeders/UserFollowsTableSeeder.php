<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserFollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('user_follows')->insert([
            'user_id' => 1,
            'follow_id' => 2,
        ]);


        DB::table('user_follows')->insert([
            'user_id' => 2,
            'follow_id' => 3,
        ]);

        DB::table('user_follows')->insert([
            'user_id' => 3,
            'follow_id' => 2,
        ]);

        DB::table('user_follows')->insert([
            'user_id' => 3,
            'follow_id' => 1,
        ]);

        $users = User::all();

        // Populate the pivot table
        User::all()->each(function ($user) use ($users) { 
            $user->follows()->attach(
                $users->random(rand(1, 3))->except($user->id)->pluck('id')->toArray()  //A user follows any random 3 users except themself
            ); 
        });

    }
}
