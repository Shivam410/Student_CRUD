<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'roll_no'  => $this->faker->unique()->randomNumber(5), // Unique Roll No
            'name'     => $this->faker->name,
            'school'   => $this->faker->company,
            'address'  => $this->faker->address,
            'email'    => $this->faker->unique()->safeEmail,
            'phone'    => $this->faker->unique()->numerify('##########'), // 10-digit number
            'class'    => 'Class ' . rand(1, 12),
            'dob'      => $this->faker->date('Y-m-d', '2005-01-01'),
            'gender'   => $this->faker->randomElement(['male', 'female', 'other']),
            'image'    => 'default.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
