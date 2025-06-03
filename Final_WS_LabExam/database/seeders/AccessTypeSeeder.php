<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccessType;

class AccessTypeSeeder extends Seeder
{
    public function run()
    {
        $types = ['admin', 'instructor', 'student'];
        
        foreach ($types as $type) {
            AccessType::create([
                'access_type' => $type
            ]);
        }
    }
} 