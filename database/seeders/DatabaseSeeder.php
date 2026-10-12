<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nip' => '198501012010011001',
            'nama' => 'Admin Sekolah',
            'jenis_kelamin' => 'Laki-laki',
            'mata_pelajaran' => null,
            'no_telepon' => '081234567890',
            'username' => 'admin',
            'role' => 'admin',
            'status' => 'aktif',
        ]);
    }
}
