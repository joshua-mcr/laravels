<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class TeacherFactory extends Factory
{

    public function definition()
    {
        return [
            'subject_code' => $this->faker->randomKey(['YR1','YR2','YR3','YR4']),
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(2),
            'instructor' => $this->faker->name(),
            'schedule' => array_rand([
                'MTH 1PM - 6PM' => 'MTH 1PM - 6PM',
                'TF 8:30AM - 1:30PM' => 'TF 8:30AM - 1:30PM',
                'WED 9AM - 3PM' => 'WED 9AM - 3PM',
                'SAT 8AM - 12PM' => 'SAT 8AM - 12PM',
            ]),
            'prelims' => mt_rand(1.0 * 10, 5.0 * 10)/10,
            'midterms' => mt_rand(1.0 * 10, 5.0 * 10)/10,
            'prefinals' => mt_rand(1.0 * 10, 5.0 * 10)/10,
            'finals' => mt_rand(1.0 * 10, 5.0 * 10)/10,
            'date_taken' => $this->faker->date(),
        ];
    }
}
