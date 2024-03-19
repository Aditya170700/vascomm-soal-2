<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@vascomm.com',
                'email_verified_at' => now(),
                'phone' => '089726352435',
                'role' => User::ADMIN,
                'status' => User::ACTIVE,
                'password' => bcrypt('password'),
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'User',
                'email' => 'user@vascomm.com',
                'email_verified_at' => now(),
                'phone' => '0891623524352',
                'role' => User::USER,
                'status' => User::ACTIVE,
                'password' => bcrypt('password'),
                'created_at' => now(),
            ]
        ]);
    }
}
