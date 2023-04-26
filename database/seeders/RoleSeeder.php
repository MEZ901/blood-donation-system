<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
        ]);
        $admin->givePermissionTo([
            'create hospitals',
            'read hospitals',
            'update hospitals',
            'delete hospitals',
            'create users',
            'read users',
            'update users',
            'delete users',
        ]);

        $sub_admin = Role::create([
            'name' => 'sub_admin',
        ]);
        $sub_admin->givePermissionTo([
            'create blood drives',
            'read blood drives',
            'update blood drives',
            'delete blood drives',
        ]);

        $donor = Role::create([
            'name' => 'donor',
        ]);
        $donor->givePermissionTo([  
            'create appointments',
            'read appointments',
            'update appointments',
            'delete appointments',
        ]);
    }
}
