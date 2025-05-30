<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nom' => 'Dado',
            'email' => 'dado@gmail.com',
            'password' => Hash::make('watt123'), 
            'role' => 'admin',
        ]);
    }
}
