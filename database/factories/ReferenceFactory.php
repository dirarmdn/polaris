<?php

namespace Database\Factories;

use App\Models\Pengajuan;
use App\Models\Reference;
use App\Models\Submission;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReferenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reference::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->paragraph,
            'type' => $this->faker->randomElement(['link', 'file']),
            'path' => $this->faker->filePath(),
            'submission_code' => Submission::factory()->create()->submission_code,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
