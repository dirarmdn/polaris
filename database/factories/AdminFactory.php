<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Organisasi;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'user_id' => User::factory(), // Relasi dengan tabel Users
        ];
    }
}
