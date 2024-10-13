<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Création d'un user par défaut
        \App\Models\User::factory()->create([
            'name' => "Yakub",
            'email' => "a@a.a",
            'password' => Hash::make("azer"),
        ]);
    }
}
