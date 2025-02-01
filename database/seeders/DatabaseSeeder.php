<?php

namespace Database\Seeders;
use App\Models\User;
use Database\Seeders\AdminSeeder; // Ensure this is correctly imported

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run the AdminSeeder to create the admin user
        $this->call(AdminSeeder::class);

        // Optionally, create additional users for testin
    }
}