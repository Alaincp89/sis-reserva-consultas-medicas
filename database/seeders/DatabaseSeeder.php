<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear usuarios de ejemplo
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Secretaria',
            'email' => 'secretaria@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Medico1',
            'email' => 'medico1@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Paciente1',
            'email' => 'paciente1@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
