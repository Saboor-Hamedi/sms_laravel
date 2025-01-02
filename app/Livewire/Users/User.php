<?php

namespace App\Livewire\Users;

use App\Models\User as UserModel;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\Attributes\Lazy;

class User extends Component
{
    #[Lazy]
    #[Layout('layouts.app')]
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    public $permissions = [];

    public $permission_name = '';


    public function mount()
    {
        $this->permissions = $this->fetchPermissions();
    }

    public function fetchPermissions()
    {
        return Permission::pluck('name', 'id');
    }

    public function save()
    {
        $this->validate(
            [
                'name' => 'required|alpha|min:2|max:50',
                'email' => 'required|string|email|unique:users,email|max:255',
                'password' => 'required|confirmed|min:6|max:25',
                'password_confirmation' => 'required',
                'permission_name' => 'nullable|exists:permissions,name',
            ]
        );

        try {
            $user = UserModel::create([
                'name' => $this->name,
                'email' => Str::lower($this->email),
                'password' => bcrypt($this->password),
            ]);

            // Assign permission if selected
            if (!empty($this->permission_name)) {
                $user->givePermissionTo($this->permission_name);
            } else {
                // Default permission assignment logic
                $studentPermission = Permission::firstOrCreate(['name' => 'student']);
                $studentRole = Role::firstOrCreate(['name' => 'student']);
                if (!$studentRole->hasPermissionTo($studentPermission)) {
                    $studentRole->givePermissionTo($studentPermission);
                }
                $user->assignRole($studentRole);
                $user->givePermissionTo($studentPermission);
            }

            session()->flash('success', 'Registration successful!');
        } catch (\Exception $e) {
            session()->flash('error', 'Registration failed! ' . $e->getMessage()); // Include error message
        }
        $this->resetForm();
    }
    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->permission_name = '';
    }
    public function cancel()
    {
        $this->reset();
        return redirect()->route('dashboard');
    }

    public function delete() {}


    public function render()
    {
        return view('livewire.users.user', ['permissions' => $this->permissions]);
    }
}
