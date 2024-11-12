<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Organization::class;
    public function definition(): array
    {
        return [
            'organization_code' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'), // e.g. ABC123
            'organization_name' => $this->faker->company,
            'company_description' => $this->faker->paragraph, 
            'address' => $this->faker->address, 
            'website' => $this->faker->url, 
            'business_field' => $this->faker->word, 
            'logo' => $this->faker->imageUrl(640, 480, 'business', true)
        ];
    }
}
