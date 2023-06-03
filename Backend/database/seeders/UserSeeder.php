<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user::create([
            'nama' => 'Administrator',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => 'admin',
            'status' => 'aktif',
            'last_login' => now()
        ]);

        User::factory()->count(5)->create();
    }
}
