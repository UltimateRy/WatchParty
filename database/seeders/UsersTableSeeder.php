<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $a = new User;
        $a->username = "ryanmorgans";
        $a->name = "Ryan Morgans";
        $a->email = "ryan.morgans.2001@gmail.com";
        $a->password = "newpassword";
        $a->role = "Admin";
        $a->save();

        $a = new User;
        $a->username = "jthomas1099";
        $a->name = "John Thomas";
        $a->email = "a.thomas@gmail.com";
        $a->password = "newpassword";
        $a->role = "Member";
        $a->save();

        $a = new User;
        $a->username = "brad_smith";
        $a->name = "Bradley Smith";
        $a->email = "bradsmith.new@aol.com";
        $a->password = "newpassword";
        $a->role = "Member";
        $a->save();

        $users = User::factory()->count(10)->create();
    }
}
