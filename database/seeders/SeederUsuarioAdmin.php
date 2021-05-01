<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SeederUsuarioAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(
            [
                'name' => 'Denílson Pereira',
                'email' => 'deene67@gmail.com',
                'password' => bcrypt('123456789')
            ]
        );

        $role = Role::create(['name' => 'Admin']);

        $permission = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permission);

        $user->assignRole([$role->id]);
    }
}
