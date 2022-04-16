<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MovieImage;

class MovieImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movieImages = MovieImage::factory()->count(13)->create();
    }
}
