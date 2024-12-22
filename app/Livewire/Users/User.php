<?php

namespace App\Livewire\Users;

use App\Models\User as UserModel;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class User extends Component
{

    #[Layout('layouts.app')]
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    public function save()
    {
        $this->validate(
            [
                'name' => 'required|alpha|min:2|max:50',
                'email' => 'required|string|email|unique:users,email|max:255',
                'password' => 'required|confirmed|min:6|max:25',
                'password_confirmation' => 'required',
            ]
        );

        // Create go grab roles and permissions
        $studentPermission = Permission::firstOrCreate(['name' => 'student']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);
        if (!$studentRole->hasPermissionTo($studentPermission)) {
            $studentRole->givePermissionTo($studentPermission);
        }
        try {
            $user = UserModel::create([
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
        $this->resetForm();
    }
    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }
    public function cancel()
    {
        $this->reset();
        return redirect()->route('dashboard');
    }

    public function delete() {}


    public function render()
    {
        return view('livewire.users.user');
    }
}
