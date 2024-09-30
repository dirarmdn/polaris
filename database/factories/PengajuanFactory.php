<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pengaju;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengajuan>
 */
class PengajuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_pengajuan' => $this->faker->unique()->regexify('[A-Z]{5}[0-9]{3}'), // e.g. ABCDE123
            'id_pengaju' => \App\Models\Pengaju::factory(), // Relasi dengan tabel Pengaju
            'isVerified' => $this->faker->boolean(),
            'judul_pengajuan' => $this->faker->sentence,
            'deskripsi_masalah' => $this->faker->paragraphs(2, true), // Deskripsi panjang
            'tujuan_aplikasi' => $this->faker->sentence(10),
            'proses_bisnis' => $this->faker->paragraph(5),
            'aturan_bisnis' => $this->faker->paragraph(5),
            'platform' => $this->faker->randomElement(['Web', 'Mobile', 'Desktop','Multi-platform']),
            'jenis_proyek' => $this->faker->randomElement(['Proyek yang sudah ada', 'Proyek Baru']),
            'stakeholder' => $this->faker->name,
        ];
    }
}
