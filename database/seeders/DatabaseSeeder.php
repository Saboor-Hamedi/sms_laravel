<?php

namespace Database\Seeders;

use App\Models\Academics;
use App\Models\Posts;
use App\Models\Scores;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    protected static ?string $password;
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'remember_token' => Str::random(10),
        ]);
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
        $admin->assignRole('admin');

        // teacher 

        $teacher = Role::create(['name' => 'teacher']);
        $teacher->givePermissionTo('create scores');
        $teacher->givePermissionTo('edit scores');
        $teacher->givePermissionTo('delete scores');
        $teacher->givePermissionTo('view scores');
        $admin->assignRole('teacher');



        // Posts::factory(1)->create();
        // Academics::factory(20)->create();
        // Scores::factory(1000)->create();
        $this->call(AcademicsSeeder::class);
        $this->call(ScoresSeeder::class);
        $this->call(PostsSeeder::class);



        // User::create([
        //     'name' => 'Teacher',
        //     'email' => 'teacher@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('123'),
        //     'remember_token' => Str::random(10),
        // ]);

        // User::create([
        //     'name' => 'Guest',
        //     'email' => 'guest@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('123'),
        //     'remember_token' => Str::random(10),
        // ]);

        // User::create([
        //     'name' => 'Parent',
        //     'email' => 'parent@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('123'),
        //     'remember_token' => Str::random(10),
        // ]);

        Role::firstOrCreate(['name' => 'teacher']);
        Role::firstOrCreate(['name' => 'student']);
        Role::firstOrCreate(['name' => 'parent']);
        Role::firstOrCreate(['name' => 'principal']);
        Role::firstOrCreate(['name' => 'manager']);
        Role::firstOrCreate(['name' => 'admin']);
    }
}
