<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Party;

class PartiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Party;
        $p->host_id = "1";
        $p->movie_id = "1";
        $p->invite_only = 0;
        $p->save();

        $p = new Party;
        $p->host_id = "2";
        $p->movie_id = "2";
        $p->invite_only = 0;
        $p->save();

        $p = new Party;
        $p->host_id = "3";
        $p->movie_id = "3";
        $p->invite_only = 1;
        $p->save();


        $users = Party::factory()->count(4)->create();

    }
}
