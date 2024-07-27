<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userData = [
            [
                'username' => 'admin',
                'password' => bcrypt('admin123'),
                'role' => 'manager'
            ],
            [
                'username' => 'sales',
                'password' => bcrypt('sales123'),
                'role' => 'sales'
            ],
        ];

        foreach ($userData as $key => $user) {
            User::create($user);
        }
    }
}
