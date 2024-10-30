<?php

namespace Database\Factories;

use App\Models\Pengajuan;
use App\Models\Referensi;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReferensiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Referensi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'keterangan' => $this->faker->paragraph,
            'tipe' => $this->faker->randomElement(['link', 'file', 'image']),
            'path' => $this->faker->filePath(),
            'kode_pengajuan' => Pengajuan::factory()->create()->kode_pengajuan,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
