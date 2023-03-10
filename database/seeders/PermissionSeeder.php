<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = [
            'manage-roles',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'view-settings',
            'view-charts',
            'view-events',
            'add-event'
        ];

      foreach ($permissions as $permission) {
           Permission::create(['name' => $permission]);
      }
    }
}
