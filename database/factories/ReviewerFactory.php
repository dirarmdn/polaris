<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reviewer>
 */
class ReviewerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::factory(),
            'nip_reviewer' => $this->faker->unique()->regexify('[0-9]{18}'), // e.g. 123456789012345678
            'isActive' => true,
            'review_total' => 0
        ];
    }
}
