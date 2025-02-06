<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Daftar permission
        $permissions = [
            'manage users',
            'manage roles',
            'manage orders',
            'manage products',
            'view reports',
            'place order',
            'view orders',
            'cancel order',
            'update order status' // Tambahkan permission ini
        ];

        // Buat permissions dulu
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Daftar role
        $roles = [
            'admin' => Permission::all(),
            'staff' => ['manage orders', 'update order status', 'view reports'],
            'customer' => ['place order', 'view orders', 'cancel order']
        ];

        // Buat roles dan beri permission
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
            $role->givePermissionTo($rolePermissions);
        }
    }
}
