<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'chief']);
        Role::create(['name' => 'author']);
        Role::create(['name' => 'reviewer']);
        Role::create(['name' => 'layout']);
        Role::create(['name' => 'copy']);
    }
}
