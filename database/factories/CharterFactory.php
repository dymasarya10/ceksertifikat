<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Charter>
 */
class CharterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::inRandomOrder()->first(),
            'event_id' => Event::inRandomOrder()->first(),
            'serial_number' => 'Phoescal2023_'.fake()->randomNumber(8,true),
            'path' => fake()->randomNumber(8,true).'.pdf',
        ];
    }
}
