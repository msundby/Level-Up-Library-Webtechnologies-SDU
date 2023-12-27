<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds for one admin profile
     * Should not be here, only for demonstration purpose
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@lul.com',
            'password' => Hash::make('Admin123'),
            'is_admin' => true,
        ]);
    }
}
