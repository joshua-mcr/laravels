<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
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
            'subject_code' => $this->faker->subject_code(),
            'name' => $this->faker->name(),
            'description' => $this->faker->description(),
            'instructor' => $this->faker->instructor(),
            'schedule' => $this->faker->schedule(),
            'prelims' => rand(1,5),
            'midterms' => rand(1,5),
            'prefinals' => rand(1,5),
            'finals' => rand(1,5),
            'remarks' => $this->faker->remarks(),
        ];
    }
}
