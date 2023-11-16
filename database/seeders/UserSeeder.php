<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => User::ROLE_ADMIN
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'role' => User::ROLE_USER
        ]);
    }
}
