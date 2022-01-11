<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PartyUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('party_users')->insert([
            'party_id' => 1,
            'user_id' => 2,
        ]);

        DB::table('party_users')->insert([
            'party_id' => 1,
            'user_id' => 3,
        ]);

        DB::table('party_users')->insert([
            'party_id' => 2,
            'user_id' => 3,
        ]);

        DB::table('party_users')->insert([
            'party_id' => 2,
            'user_id' => 4,
        ]);
    }
}
