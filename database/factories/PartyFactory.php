<?php

namespace Database\Factories;

use App\Models\Party;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PartyFactory extends Factory
{
    protected $model = Party::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'host_id' => $this->faker->unique->numberBetween(1, 11),
            'movie_id' => $this->faker->numberBetween(1, 11),
            'invite_only' => $this->faker->numberBetween(0, 1),
        ];
    }
}
