<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\UserImage;

class UserImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$userImages = UserImage::factory()->count(13)->create();

        

        for ($x = 1; $x <= 13; $x++) {
        
            DB::table('user_images')->insert([
                'id' => $x,
                'file_path' => "DEFAULT",
            ]);

        }
    }
}
