<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@travelindo.com'],
            [
                'name' => 'Admin TravelIndo',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@travelindo.com'],
            [
                'name' => 'User Demo',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ]
        );

        echo "✅ Admin dan User demo berhasil dibuat!\n";
    }
}
