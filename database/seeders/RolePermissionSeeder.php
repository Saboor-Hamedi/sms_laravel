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
        // Create roles
        $admin = User::where('email', 'admin@gmail.com')->first();
        $teacher = User::where('email', 'teacher@gmail.com')->first();
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $principalRole = Role::firstOrCreate(['name' => 'principal']);
        $admin->assignRole('admin');
        $teacher->assignRole('teacher');
        // Create permissions

        $adminPermission = Permission::firstOrCreate(['name' => 'admin']);
        $teacherPermission = Permission::firstOrCreate(['name' => 'teacher']);
        $principalPermission = Permission::firstOrCreate(['name' => 'principal']);

        // Assign permissions to roles
        $adminRole->givePermissionTo($adminPermission);
        $teacherRole->givePermissionTo($teacherPermission);
        $principalRole->givePermissionTo($principalPermission);
        // $adminRole->givePermissionTo([$adminPermission, $teacherPermission, $principalPermission]);

    }
}
