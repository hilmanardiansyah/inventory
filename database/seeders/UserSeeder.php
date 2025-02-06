<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password123'),
                'role' => 'admin'
            ],
            [
                'name' => 'Staff User',
                'email' => 'staff@example.com',
                'password' => bcrypt('password123'),
                'role' => 'staff'
            ],
            [
                'name' => 'Customer User',
                'email' => 'customer@example.com',
                'password' => bcrypt('password123'),
                'role' => 'customer'
            ],
        ];

        foreach ($users as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                ['name' => $userData['name'], 'password' => $userData['password']]
            );

            // Assign role ke user
            $role = Role::where('name', $userData['role'])->first();
            if ($role) {
                $user->assignRole($role);
            }
        }
    }
}
