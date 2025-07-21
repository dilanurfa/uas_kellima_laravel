<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role_id' => 1,
                'photo' => null,
                'email_verified_at' => Carbon::now(),
                'remember_token' => Str::random(10),
            ]);
        }

        // User Biasa
        if (!User::where('email', 'jeon@example.com')->exists()) {
            User::create([
                'name' => 'Jeon User',
                'email' => 'jeon@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2,
                'photo' => null,
                'email_verified_at' => Carbon::now(),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
