<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Organisasi;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => $this->faker->unique()->regexify('[0-9]{18}'), // NIP 18 digits
            'kode_organisasi' => Organisasi::factory(), // Relasi dengan tabel Organisasi
            'nama' => $this->faker->name,
            'password' => bcrypt('password'), // Password default hashed
            'role' => $this->faker->randomElement(['Reviewer', 'Super Admin', 'Manager']) // Role
        ];
    }
}
