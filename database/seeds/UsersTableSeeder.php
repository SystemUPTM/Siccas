<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use App\User;

use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // create user super admin
        $user = User::create([
            'name' => 'super-admin',
            'email' => 'super-admin@siccas.com',
            'password' => bcrypt('superAdmin2019')
        ]);

        // create super administrator role
        $role = Role::create(['name' => 'super-admin']);

        $user->assignRole('super-admin');

        // create permissions
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'read']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);

        $role->givePermissionTo('create');
        $role->givePermissionTo('read');
        $role->givePermissionTo('update');
        $role->givePermissionTo('delete');

        // create user admin
        $userAdmin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@siccas.com',
            'password' => bcrypt('admin')
        ]);

        // create administrator role
        $roleAdmin = Role::create(['name' => 'admin']);

        // assign administrator role to user admin
        $userAdmin->assignRole('admin');

        // assign crud permissions to administrator
        $roleAdmin->givePermissionTo('create');
        $roleAdmin->givePermissionTo('read');
        $roleAdmin->givePermissionTo('update');
        $roleAdmin->givePermissionTo('delete');

        // check if administrator rol have destroy propietario
        if ($roleAdmin->hasPermissionTo('delete'))
            echo 'administrator rol have destroy permission';

        // create user secretary
        $userSecretary = User::create([
            'name' => 'Secretaria',
            'email' => 'secretaria@siccas.com',
            'password' => bcrypt('siccas2019')
        ]);

        // create secretary role
        $roleSecretary = Role::create(['name' => 'secretary']);

        // assign secretary role to user secretary
        $userSecretary->assignRole('secretary');

        // assign crud permissions to Secretary
        $roleSecretary->givePermissionTo('read');
    }
}
