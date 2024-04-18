<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RegSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'f_name' => 'First',
            'l_name' => 'Admin',
            'email' => 'admin@example.com',
            'username' => 'admin123',
            'password' => Hash::make('80868526'),
            'role' => 'admin',
        ]);
    }
}
