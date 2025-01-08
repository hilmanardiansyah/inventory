<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AssignAdminRoleSeeder extends Seeder
{
    public function run()
    {
        // Buat role admin jika belum ada
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Cari user yang ingin dijadikan admin
        $user = User::where('email', 'admin@example.com')->first();

        // Berikan role admin ke user tersebut
        if ($user) {
            $user->assignRole($role);
            echo "Role 'admin' assigned to user with email: admin@example.com\n";
        } else {
            echo "User with email 'admin@example.com' not found.\n";
        }
    }
}
