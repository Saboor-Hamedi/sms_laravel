<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $admin = Permission::firstOrCreate(['name' => 'admin']);
        $teacher = Permission::firstOrCreate(['name' => 'teacher']);
        $prinicipal = Permission::firstOrCreate(['name' => 'principal']);
        $student = Permission::firstOrCreate(['name' => 'student']);

        // Create roles and assign permissions
        $role = Role::firstOrCreate(['name' => 'admin']);
        $role->givePermissionTo($admin);

        $role = Role::firstOrCreate(attributes: ['name' => 'teacher']);
        $role->givePermissionTo($teacher);

        $role = Role::firstOrCreate(['name' => 'principal']);
        $role->givePermissionTo($prinicipal);

        $role = Role::firstOrCreate(['name' => 'student']);
        $role->givePermissionTo($student);
    }
}
