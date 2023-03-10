<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
              'email'    => 'mbyinfotech@gmail.com',
              'name'     => 'Muhammad Bello',
              'password' => Hash::make('12345678'),
              'role'     => 'admin',
              'status'   => 1
            ],
            [
              'email'    => 'coordinator@gmail.com',
              'name'     => 'Coordinator User',
              'password' => Hash::make('12345678'),
              'role'     => 'coordinator',
              'status'   => 1
            ],
            [
              'email'    => 'staff@gmail.com',
              'name'     => 'Staff User',
              'password' => Hash::make('12345678'),
              'role'     => 'staff',
              'status'   => 1
            ],
            [
              'email'    => 'technical@gmail.com',
              'name'     => 'Technical User',
              'password' => Hash::make('12345678'),
              'role'     => 'technical',
              'status'   => 1
            ],
          ];

         $role = new Role;
          foreach ($users as $key => $user) {
            $newUser = User::updateOrCreate([
                         'email' => $user['email']
                     ], [
                         'name'     => $user['name'],
                         'password' => $user['password']
                     ]);

                     if ($newUser->id == 1) {
                         $role = $role->updateOrCreate(['name' => 'admin']);
                     } else if ($newUser->id == 2) {
                         $role = $role->updateOrCreate(['name' => 'coordinator']);
                     } else if ($newUser->id == 3) {
                       $role = $role->updateOrCreate(['name' => 'staff']);
                     }else if ($newUser->id == 4){
                       $role = $role->updateOrcreate(['name' => 'technical']);
                     }

                    $permissions = Permission::pluck('id')->toArray();

                    $role->syncPermissions($permissions);
                    $newUser->assignRole([$role->id]);
          }
    }
}
