<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Organisasi;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengaju>
 */
class PengajuFactory extends Factory
{
protected $model = \App\Models\Pengaju::class;

public function definition(): array
{
    return [
        'user_id' => User::factory(),
        'kode_organisasi' => Organisasi::factory()->create()->kode_organisasi,
        'jabatan' => $this->faker->jobTitle,
    ];
}
}
