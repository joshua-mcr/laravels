<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


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
            'birthdate' => $this->faker->date(),
            'sex'       => array_rand(['MALE' => 'MALE','FEMALE' => 'FEMALE']),
            'address'   => $this->faker->address(),
            'year'      => rand(1,4),
            'course'    => array_rand([
                'BSCS'      => 'BSCS',
                'BSIT'      => 'BSCS',
                'BEED'  => 'BEED',
                'BSSS'  => 'BSSS',
                ]),
             'section'    => array_rand([
                '1a'      => '1a',
                '2a'      => '2a',
                '3a'  => '3a',
                '4a'  => '4a',
                ]),           
            
            
        ];
    }
}
