<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create article 
        Article::create([
            'title' => 'Article 1',
            'desc' => 'Content 1',
            'image' => 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',
            'author_id' => 1,
        ]);

        Article::create([
            'title' => 'Article 2',
            'desc' => 'Content 2',
            'image' => 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',
            'author_id' => 1,
        ]);

        Article::create([
            'title' => 'Article 3',
            'desc' => 'Content 3',
            'image' => 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png',
            'author_id' => 1,
        ]);
    }
}
