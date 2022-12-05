<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create gallery
        $gallery = Gallery::create([
            'title' => 'My Gallery',
            'image' => 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png'
        ]);
    }
}
