<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        category::factory(3)->create();

        // Appelle également la factory Event pour créer des événements liés à ces catégories
        \App\Models\Event::factory(10)->create();
    }
}
