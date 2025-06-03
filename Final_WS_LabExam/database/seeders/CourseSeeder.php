<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $courses = [
            [
                'name' => 'BSIT',
                'description' => 'ITITTITI',
                'code' => 'BSIT',
                'created_date' => now()
            ],
            [
                'name' => 'BSMATH',
                'description' => 'MATINIK',
                'code' => 'BSMATH',
                'created_date' => now()
            ],
            [
                'name' => 'BSBS',
                'description' => 'BSBS DES',
                'code' => 'BSBS',
                'created_date' => now()
            ]
        ];
        
        foreach ($courses as $course) {
            Course::create($course);
        }
    }
} 