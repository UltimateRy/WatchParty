<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(UserFollowsTableSeeder::class);

        $this->call(MoviesTableSeeder::class);
        $this->call(PartiesTableSeeder::class);
    }
}
