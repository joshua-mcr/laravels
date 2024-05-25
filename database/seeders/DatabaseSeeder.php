<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Student::factory(20)->create();
        Teacher::factory(10)->create();

        //User::factory()->create([
         //   'name' => 'Test User',
           // 'email' => 'test@example.com',
       // ]);
    }
}
