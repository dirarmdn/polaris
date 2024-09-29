<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Organisasi;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengaju>
 */
class PengajuFactory extends Factory
{
    protected $model = \App\Models\Pengaju::class;

    public function definition(): array
    {
        return [
            'kode_organisasi' => \App\Models\Organisasi::factory(), // Menghubungkan ke factory Organisasi
            'nama_pengaju' => $this->faker->name,
            'email_pengaju' => $this->faker->unique()->safeEmail,
            'jabatan' => $this->faker->jobTitle,
            'no_telp' => $this->faker->phoneNumber,
        ];
    }
}
