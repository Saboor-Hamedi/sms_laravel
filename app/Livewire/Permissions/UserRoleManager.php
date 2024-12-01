<?php

namespace App\Livewire\Permissions;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoleManager extends Component
{

    #[Validate('required|email')]
    public $email;
    public $roles = [];
    public $permissions = [];
    public $userRoles = [];
    public $userPermissions = [];

    public $user;

    // Fetch roles and permissions to populate the form
    public function mount()
    {
        $this->roles = Role::get();
        $this->permissions = Permission::get();
    }

    // Method to load user roles and permissions based on email input
    public function rolesAndPermissions()
    {
        $this->validate();
        $this->user = User::where('email', $this->email)->first();

        if ($this->user) {
            $this->userRoles = $this->user->roles->pluck('name')->toArray();
            $this->userPermissions = $this->user->permissions->pluck('name')->toArray();
            session()->flash('error', 'User found.');
        } else {
            $this->userRoles = [];
            $this->userPermissions = [];
            session()->flash('error', 'User not found.');
        }
    }

    // Method to toggle roles
    public function toggleRole($roleName)
    {
        if (in_array($roleName, $this->userRoles)) {
            $this->removeRole($roleName);
        } else {
            $this->assignRole($roleName);
        }
    }

    // Method to toggle permissions
    public function togglePermission($permissionName)
    {
        if (in_array($permissionName, $this->userPermissions)) {
            $this->revokePermission($permissionName);
        } else {
            $this->assignPermission($permissionName);
        }
    }

    // Method to assign roles
    public function assignRole($roleName)
    {
        if ($this->user) {
            $this->user->assignRole($roleName);
            $this->rolesAndPermissions();
            session()->flash('message', 'Role assigned successfully');
        }
    }

    // Method to remove roles
    public function removeRole($roleName)
    {
        if ($this->user) {
            $this->user->removeRole($roleName);
            $this->rolesAndPermissions();
            session()->flash('message', 'Role removed successfully.');
        }
    }

    // Method to assign permissions
    public function assignPermission($permissionName)
    {
        if ($this->user) {
            $this->user->givePermissionTo($permissionName);
            $this->rolesAndPermissions();
            session()->flash('message', 'Permission assigned successfully.');
        } else {
            session()->flash('error', 'User not found.');
        }
    }

    // Method to revoke permissions
    public function revokePermission($permissionName)
    {
        if ($this->user) {
            $this->user->revokePermissionTo($permissionName);
            $this->rolesAndPermissions();
            session()->flash('message', 'Permission revoked successfully.');
        } else {
            session()->flash('error', 'User not found.');
        }
    }

    public function render()
    {
        return view('livewire.permissions.user-role-manager')->layout('layouts.app');
    }
}
