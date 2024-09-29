<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organisasi>
 */
class OrganisasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Organisasi::class;
    public function definition(): array
    {
        return [
            'kode_organisasi' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'), // e.g. ABC123
            'nama' => $this->faker->company
        ];
    }
}
