<?php

namespace Database\Factories;

use App\Models\Reviewer;
use App\Models\Submitter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'submission_code' => $this->faker->unique()->regexify('[A-Z]{5}[0-9]{3}'), // e.g. ABCDE123
            'submitter_id' => Submitter::factory(),
            'nip_reviewer' => Reviewer::factory(),
            'status' => $this->faker->randomElement(['belum_direview', 'terverifikasi', 'ditolak', 'diarsipkan']),
            'submission_title' => $this->faker->sentence,
            'problem_description' => $this->faker->paragraphs(2, true), // Deskripsi panjang
            'application_purpose' => $this->faker->sentence(10),
            'business_process' => $this->faker->paragraph(5),
            'business_rules' => $this->faker->paragraph(5),
            'platform' => $this->faker->randomElement(['web', 'mobile', 'desktop','multi-platform']),
            'project_type' => $this->faker->boolean(),
            'stakeholders' => $this->faker->name,
        ];
    }
    
}
