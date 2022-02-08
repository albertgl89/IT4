<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Reset cached roles and permissions
       app()[PermissionRegistrar::class]->forgetCachedPermissions();

       // create permissions
       Permission::create(['name' => 'manage data']);
       Permission::create(['name' => 'view data']);

       // create roles and assign existing permissions
       $role1 = Role::create(['name' => 'admin']);
       $role1->givePermissionTo('manage data');
       $role1->givePermissionTo('view data');

       $role2 = Role::create(['name' => 'user']);
       $role2->givePermissionTo('view data');

       $role3 = Role::create(['name' => 'Super-Admin']);
       // gets all permissions via Gate::before rule; see AuthServiceProvider

       //create demo users
       $user = \App\Models\User::factory()->create([
           'name' => 'Admin User',
           'email' => 'admin@matchmaker.com',
       ]);
       $user->assignRole($role1);

       $user = \App\Models\User::factory()->create([
           'name' => 'Regular User',
           'email' => 'john@example.com',
       ]);
       $user->assignRole($role2);

       $user = \App\Models\User::factory()->create([
           'name' => 'Example Super-Admin User',
           'email' => 'superadmin@matchmaker.com',
       ]);
       $user->assignRole($role3);
   }
}
