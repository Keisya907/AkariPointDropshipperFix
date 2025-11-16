<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // ← ini taruh di sini
use App\Models\User; // ← ini juga di sini

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Pawon',
            'email' => 'admin@pawon.com',
            'password' => Hash::make('123456'), // Password default
        ]);
    }
}
