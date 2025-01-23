<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'usertype' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'Shakira Anadella',
            'email' => 'shakira@gmai.com',
            'usertype' => 'user',
            'password' => Hash::make('shakira123'),
        ]);

        User::create([
            'name' => 'Salma nurfauziah',
            'email' => 'salma@gmail.com',
            'usertype' => 'user',
            'password' => Hash::make('salma123'),
        ]);

        User::create([
            'name' => 'Najwa Aulia',
            'email' => 'najwa@gmail.com',
            'usertype' => 'user',
            'password' => Hash::make('najwa123'),
        ]);

        User::create([
            'name' => 'Hawarizmi',
            'email' => 'hawa@gmail.com',
            'usertype' => 'user',
            'password' => Hash::make('hawa123'),
        ]);
    }
}
