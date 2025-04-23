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
        User::factory()->create([
            'name' => 'Ade Nova Admin',
            'email' => 'nova@admin.com',
            'password' => 'admin123',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Ade Nova Petugas Loket',
            'email' => 'nova@petugas.com',
            'password' => 'petugas123',
            'role' => 'petugas_loket',
        ]);

        User::factory(10)->create();
    }
}
