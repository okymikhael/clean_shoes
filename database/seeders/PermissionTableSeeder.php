<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'resi-list',
            'resi-create',
            'resi-edit',
            'resi-delete',
            'sepatu-list',
            'sepatu-create',
            'sepatu-edit',
            'sepatu-delete',
            'transaction-list',
            'transaction-create',
            'transaction-edit',
            'transaction-delete',
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}