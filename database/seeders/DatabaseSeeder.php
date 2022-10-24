<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // call seeder RekeningSeeder & UserSeeder
         $this->call([
              RekeningSeeder::class,
                UserSeeder::class,
            ]);

    }
}