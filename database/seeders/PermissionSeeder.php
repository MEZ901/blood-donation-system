<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create appointments']);
        Permission::create(['name' => 'read appointments']);
        Permission::create(['name' => 'update appointments']);
        Permission::create(['name' => 'delete appointments']);

        Permission::create(['name' => 'create blood drives']);
        Permission::create(['name' => 'read blood drives']);
        Permission::create(['name' => 'update blood drives']);
        Permission::create(['name' => 'delete blood drives']);

        Permission::create(['name' => 'create hospitals']);
        Permission::create(['name' => 'read hospitals']);
        Permission::create(['name' => 'update hospitals']);
        Permission::create(['name' => 'delete hospitals']);

        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

    }
}
