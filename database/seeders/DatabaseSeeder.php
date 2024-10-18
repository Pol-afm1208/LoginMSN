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
        // Llamamos al RoleSeeder para crear los roles
        $this->call([
            RoleSeeder::class, // Asegúrate de que RoleSeeder esté en la misma carpeta
        ]);
      
    }
}
