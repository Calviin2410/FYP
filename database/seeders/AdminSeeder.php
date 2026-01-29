<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'password' => '12345678'
            ],
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
