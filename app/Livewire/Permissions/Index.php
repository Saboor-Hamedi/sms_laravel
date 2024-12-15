<?php

namespace App\Livewire\Permissions;

use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Index extends Component
{

    #[Layout('layouts.app')]
    // public function mount()
    // {
    //     if (!Auth::user()->hasRole(['admin'])) {
    //         $this->redirect('/dashboard');
    //     }
    // }
    public function render()
    {

        // $permissions = Role::with('permissions')->latest()->paginate(3);
        $permissions = Permission::with('roles')->latest()->paginate(3);

        return view('livewire.permissions.index', ['permissions' => $permissions]);
    }
}
