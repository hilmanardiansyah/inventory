<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        // Membuat roles terlebih dahulu
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $staffRole = Role::firstOrCreate(['name' => 'staff']);
        $customerRole = Role::firstOrCreate(['name' => 'customer']);

        // Membuat user dengan role admin
        $adminUser = User::factory()->create();
        $adminUser->assignRole('admin');

        // Membuat user dengan role staff
        $staffUser = User::factory()->create();
        $staffUser->assignRole('staff');

        // Membuat user dengan role customer
        $customerUser = User::factory()->create();
        $customerUser->assignRole('customer');
    }
}
