<?php

namespace App\Livewire\Students;

use App\Models\User;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Register extends Component
{

    #[Layout('layouts.app')]

    #[Validate('required|alpha|min:2|max:50')]
    public $name = '';
    #[Validate('required|string|email|unique:users,email|max:255')]
    public $email = '';
    #[Validate('required|confirmed|min:6|max:25')]
    public $password = '';
    #[Validate('required')]
    public $password_confirmation = '';

    public function save()
    {
        $this->validate();
        // Create go grab roles and permissions
        $studentPermission = Permission::firstOrCreate(['name' => 'student']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);
        if (!$studentRole->hasPermissionTo($studentPermission)) {
            $studentRole->givePermissionTo($studentPermission);
        }
        try {
            $user = User::create([
                'name' => $this->name,
                'email' => Str::lower($this->email),
                'password' => bcrypt($this->password),
            ]);
            // assign roles and permissions to user
            $user->assignRole($studentRole);
            $user->givePermissionTo($studentPermission);

            if ($user) {
                session()->flash('success', 'Registration successful!');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Registration failed!');
        }
        $this->reset();
    }

    public function cancel()
    {
        $this->reset();
        return redirect()->route('dashboard');
    }

    public function delete() {}


    public function render()
    {
        return view('livewire.students.register');
    }
}
