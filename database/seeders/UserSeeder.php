<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();

        User::create([
            'role' => 'admin',
            'name' => 'admin',
            'surname' => 'test',
            'email' => 'admin@test.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'role' => 'user',
            'name' => 'user',
            'surname' => 'test',
            'email' => 'user@test.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
