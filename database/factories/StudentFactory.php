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
            'firstname' => $this->faker->firstname(),
            'lastname'  => $this->faker->lastname(),
            'year'      => rand(1,4),
            'course'    => array_rand([
                'BSCS'      => 'BSCS',
                'BSIT'      => 'BSCS',
                'PUREGOLD'  => 'PUREGOLD',
                ]),
            'sex'       => array_rand(['MALE','FEMALE','HELICOPTER','RAINBOW']),
            'address'   => $this->faker->address(),
            
        ];
    }
}
