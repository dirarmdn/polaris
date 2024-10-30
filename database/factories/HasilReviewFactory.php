<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Admin;
use App\Models\Pengajuan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HasilReview>
 */
class HasilReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id, 
            'kode_pengajuan' => Pengajuan::factory()->create()->kode_pengajuan, 
            'deskripsi_review' => $this->faker->paragraph(3), 
        ];
    }
}
