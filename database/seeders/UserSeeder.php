<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // create user admin & pengurus
        User::create([
            'name' => 'Admin',
            'email' => 'fajarsuhanaaa@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Pengurus',
            'email' => 'alhidayahkircon@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'pengurus',
        ]);
    }
}