<?php

namespace Database\Seeders;

use App\Models\Ruang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ruang::create([
            'nama' => 'LAB 1 PPLG',
            'tahun_ajaran' => 2023
        ]);
    }
}
