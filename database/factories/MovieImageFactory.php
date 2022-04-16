<?php

namespace Database\Factories;

use App\Models\MovieImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MovieImageFactory extends Factory
{

    protected $model = MovieImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_path' => Str::random(40)
        ];
    }
}
