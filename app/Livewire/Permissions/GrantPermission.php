<?php

namespace App\Livewire\Permissions;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class GrantPermission extends Component
{
    #[Lazy]
    #[Validate('required|email')]
    public $email;

    public $roles = [];

    public $permissions = [];

    public $userRoles = [];

    public $userPermissions = [];

    public $user;

    #[Layout('layouts.app')]

    // Fetch roles and permissions to populate the form
    public function mount()
    {
        // $this->roles = Role::pluck('name', 'id')->toArray();
        // $this->permissions = Permission::pluck('name', 'id')->toArray();
        $this->roles = $this->getRole();
        $this->permissions = $this->getPermission();
    }

    /**
     * Summary of getRole
     * Fetch roles name
     *
     * @return mixed
     */
    private function getRole()
    {
        return Cache::remember('role', 60, function () {
            return Role::pluck('name', 'id')->toArray();
        });
    }

    /**
     * Summary of getPermission
     * Fetch permissions name
     *
     * @return mixed
     */
    private function getPermission()
    {
        return Cache::remember('permission', 60, function () {
            return Permission::pluck('name', 'id')->toArray();
        });
    }

    // Method to load user roles and permissions based on email input
    public function rolesAndPermissions()
    {
        $this->validate();
        // $this->user = User::where('email', $this->email)->first();
        $this->user = User::with(['roles', 'permissions'])->where('email', $this->email)->first();

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
            $this->userRoles = array_diff($this->userRoles, [$roleName]); // Update the local array
            session()->flash('message', 'Role removed successfully.');
        }
    }

    // Method to assign permissions
    public function assignPermission($permissionName)
    {
        // if ($this->user) {
        //     $this->user->givePermissionTo($permissionName);
        //     $this->rolesAndPermissions();
        //     session()->flash('message', 'Permission assigned successfully.');
        // } else {
        //     session()->flash('error', 'User not found.');
        // }

        if ($this->user) {
            $this->user->givePermissionTo($permissionName);
            $this->userPermissions[] = $permissionName; // Update the local array
            session()->flash('message', 'Permission assigned successfully.');
        } else {
            session()->flash('error', 'User  not found.');
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
        return view('livewire.permissions.grant-permission');
    }
}
