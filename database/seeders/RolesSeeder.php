<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::factory()->create(['name' => 'writer']);
        $permission = Permission::factory()->create(['name' => 'edit articles']);
        Permission::factory()->create(['name' => 'access backend']);
        // admin
        $role = Role::factory()->create(['name' => 'admin']);
        // seller
        $role = Role::factory()->create(['name' => 'seller']);
        // member
        $role = Role::factory()->create(['name' => 'member']);
        $role->givePermissionTo('access backend');
    }
}
