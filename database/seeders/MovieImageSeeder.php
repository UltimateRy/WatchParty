<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        DB::table('movie_images')->insert([
            'id' => 1,
            'file_path' => "nzJ6t4SZ8PkTZHF1suj4vbY0DjkZcOQSdUVcs9L8",
        ]);

        DB::table('movie_images')->insert([
            'id' => 2,
            'file_path' => "bw2RvLEzizs8jFrRu0wEYEZ6Jvfmte8ZyqrZaDjp",
        ]);

        DB::table('movie_images')->insert([
            'id' => 3,
            'file_path' => "rFrdQxrH4H3S3Qb1aKJF0BURufF1RbVv3vCwJH4I",
        ]);

        DB::table('movie_images')->insert([
            'id' => 4,
            'file_path' => "grn6w6B3DepmE1YEgAtrA2vjvyRh8uAx2lZ5u9g6",
        ]);

        DB::table('movie_images')->insert([
            'id' => 5,
            'file_path' => "U3YojhIgszLyvrxNGaxSJQE5ZujjGzLV2AD8HAAs",
        ]);

        DB::table('movie_images')->insert([
            'id' => 6,
            'file_path' => "mjvCV2oL2DxSh9bKDwLPqIiFe6xB2JYBcNE4MAPk",
        ]);

        DB::table('movie_images')->insert([
            'id' => 7,
            'file_path' => "ENG6Ua1QfJ8XA8Z5E5SKDff8hBQXMSFa3u6EpqiX",
        ]);

        DB::table('movie_images')->insert([
            'id' => 8,
            'file_path' => "lD0BQQDuJuCIrRqekCFdVpBa0tMlajwgW4wC7CSY",
        ]);

        DB::table('movie_images')->insert([
            'id' => 9,
            'file_path' => "XfnVdILdrfb8qlUohCnuUtlMPiwoQMC7t9V2azcf",
        ]);

        DB::table('movie_images')->insert([
            'id' => 10,
            'file_path' => "OnsDmMmrGVbqTY6ZvpWhJ6LthTsjS2aaQ0nSzs2f",
        ]);

        DB::table('movie_images')->insert([
            'id' => 11,
            'file_path' => "r9txq8UcrQ0Vrb4AzCwtpJiZgAvkkhEaG3i6IgoR",
        ]);

        DB::table('movie_images')->insert([
            'id' => 12,
            'file_path' => "N3qJAWkH8QM84lkOQPU6zj3wEXhC256l2RxxguC7",
        ]);

        DB::table('movie_images')->insert([
            'id' => 13,
            'file_path' => "c7qHBRzVSJblJyomD1kELJh3SeF0TPPLkuMKPCqz",
        ]);

        #$movieImages = MovieImage::factory()->count(13)->create();
    }
}
