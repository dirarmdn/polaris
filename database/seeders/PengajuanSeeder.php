<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Pengajuan;
use Database\Seeders\Pengaju;

class PengajuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat beberapa pengaju terlebih dahulu
        $pengaju = Pengaju::factory()->create();

        // Gunakan `Pengajuan` factory dengan `pengaju` yang sudah ada
        Pengajuan::factory()->create([
            'id_pengaju' => $pengaju->id_pengaju,
        ]);
    }
}
