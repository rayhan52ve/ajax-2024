<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'name' => 'Sajid Rayhan',
            // 'username' => 'rayhan52ve',
            // 'phone' => '01329497106',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(12345678)
        ];
        User::create($admin);
    }
}
