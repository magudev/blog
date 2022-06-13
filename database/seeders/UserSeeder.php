<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Matías Benítez',
            'email' => 'matias@correo.com',
            'password' => bcrypt('password')
        ])->assignRole('Admin');
        
        User::factory(10)->create();
    }
}
