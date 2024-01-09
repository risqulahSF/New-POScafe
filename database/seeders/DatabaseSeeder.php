<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nm_user' => 'Administrator',
            'email_user' => 'superadmin1@gmail.com',
            'email_verified_at' => date('Y-m-d h:i:s'),
            'pass_user' => Hash::make('admin'),
            'role_user' => 'superadmin',
            'status_user' => 1
           ]);
    }
}
