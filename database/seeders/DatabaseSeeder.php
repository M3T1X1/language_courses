<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
 kursy
        // User::factory(10)->create();

        $this->call(
            KursyTableSeeder::class,
            
        ]);

        // Seeder dla instruktorów
        $this->call(InstruktorzyTableSeeder::class);
 

        // Seeder dla zniżek
        $this->call(ZnizkiSeeder::class);

        // Seeder dla transakcji
        $this->call(TransakcjeSeeder::class);

        // Przykładowy użytkownik
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}