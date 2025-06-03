<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\AccessType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $adminAccessType = AccessType::where('access_type', 'admin')->first();
        
        Admin::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'aid' => $adminAccessType->aid
        ]);
    }
} 