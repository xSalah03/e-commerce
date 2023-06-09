<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Salah LOUKHMI',
            'email' => 'salah@email.com',
            'password' => Hash::make('secret'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Noureddine Samad',
            'email' => 'samad@email.com',
            'password' => Hash::make('passcode'),
        ]);
    }
}
