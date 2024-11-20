<?php

namespace App\Livewire\Permissions;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public function mount()
    {
        if (!Auth::user()->hasRole(['admin'])) {
            $this->redirect('/dashboard');
        }
    }
    public function render()
    {

        // $permissions = Role::with('permissions')->latest()->paginate(3);
        $permissions = Permission::with('roles')->latest()->paginate(3);

        return view('livewire.permissions.index', ['permissions' => $permissions])->layout('layouts.app');
    }
}
