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
        \App\Models\User::factory(10)->create();
        \App\Models\Tax::factory(20)->create();
        \App\Models\BusinessCategory::factory(5)->create();
        \App\Models\Outlet::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '08789876543',
            'password' => Hash::make('password123'),
            'id_outlet' => null,
            'role' => 'admin',
            'active' => 1
        ]);
    }
}
