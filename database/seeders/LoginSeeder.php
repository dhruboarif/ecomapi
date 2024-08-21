<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Dhrubo Arif',
            'email' => 'dhruboarif@example.com',
            'password' => Hash::make('arifarif'), // It's important to hash the password
        ]);
    }
}
