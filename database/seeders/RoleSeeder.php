<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'id' => 1,
            'role' => 'admin',
        ]);

        Role::create([
            'id' => 2,
            'role' => 'pegawai',
        ]);

        Role::create([
            'id' => 3,
            'role' => 'siswa',
        ]);

        Role::create([
            'id' => 4,
            'role' => 'kurikulum',
        ]);

        Role::create([
            'id' => 5,
            'role' => 'kepsek',
        ]);
    }
}
