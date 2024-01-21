<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us')->insert([
            'title' => 'About Us Title',
            'content' => 'About Us Content',
            'image' => 'public/logo/univsearchbd_logo.png', // Provide the path or URL to the image
            'phone' => '1234567890',
            'email' => 'example@email.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

