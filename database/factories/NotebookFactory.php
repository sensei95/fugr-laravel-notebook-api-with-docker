<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notebook>
 */
class NotebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $full_name = "{$this->faker->lastName} {$this->faker->firstName} {$this->faker->name}";
        return [
            'full_name' => $full_name,
            'company' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'birthdate' => $this->faker->date,
            'avatar' => $this->faker->imageUrl,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}