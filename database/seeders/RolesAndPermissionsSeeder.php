<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Customer;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'view dashboard']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'view customer dashboard']);

        // Create roles and assign permissions
        $adminRole = Role::create(['name' => 'admin']);
        $staffRole = Role::create(['name' => 'staff']);
        $customerRole = Role::create(['name' => 'customer']);

        // Assign permissions to roles
        $adminRole->givePermissionTo('view dashboard');
        $adminRole->givePermissionTo('manage users');

        $staffRole->givePermissionTo('view dashboard');

        $customerRole->givePermissionTo('view customer dashboard');

        // Create users and assign roles
        $adminUser = User::factory()->create(); // Create admin user
        $adminUser->assignRole('admin');  // Assign admin role

        $staffUser = User::factory()->create(); // Create staff user
        $staffUser->assignRole('staff');  // Assign staff role

        $customerUser = User::factory()->create(); // Create customer user
        $customerUser->assignRole('customer');  // Assign customer role

        // Create customer records
        Customer::create([
            'user_id' => $customerUser->id,
            'name' => 'John Doe',
            'phone' => '081234567890',
            'address' => '123 Main Street, City, Country',
        ]);
    }
}
