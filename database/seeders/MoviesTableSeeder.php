<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $a = new Movie;
        $a->title = "Example Movie";
        $a->synopsis = "Andy Dufresne is sentenced to two consecutive life terms in prison for the murders of his wife and her lover and is sentenced to a tough prison.";
        $a->length = 140;
        $a->save();

        $a = new Movie;
        $a->title = "Toy Story";
        $a->synopsis = "In Earth's future, a global crop blight and second Dust Bowl are slowly rendering the planet uninhabitable.";
        $a->length = 134;
        $a->save();

        $a = new Movie;
        $a->title = "Avengers: Assemble";
        $a->synopsis = "With the help of allies Lt. Jim Gordon and DA Harvey Dent, Batman has been able to keep a tight lid on crime in Gotham City.";
        $a->length = 155;
        $a->save();

        $movies = Movie::factory()->count(10)->create();
    }
}
