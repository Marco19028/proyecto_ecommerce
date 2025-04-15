<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admins
        User::create([
            'name' => 'Admin Juan',
            'email' => 'admin1@ejemmm.com',
            'password' => Hash::make('admin1234'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Admin Olga',
            'email' => 'admin2@ejemmm.com',
            'password' => Hash::make('admin1234'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Helga',
            'email' => 'cliente1@ejemmm.com',
            'password' => Hash::make('cl13nt3004@'),
            'role' => 'cliente',
        ]);

        User::create([
            'name' => 'Antonio',
            'email' => 'cliente2@ejemmm.com',
            'password' => Hash::make('cl13nt3004@'),
            'role' => 'cliente',
        ]);

        User::create([
            'name' => 'Luis',
            'email' => 'cliente3@ejemmm.com',
            'password' => Hash::make('cl13nt3004@'),
            'role' => 'cliente',
        ]);

        User::create([
            'name' => 'Carla',
            'email' => 'cliente4@ejemmm.com',
            'password' => Hash::make('cl13nt3004@'),
            'role' => 'cliente',
        ]);
    }
}
