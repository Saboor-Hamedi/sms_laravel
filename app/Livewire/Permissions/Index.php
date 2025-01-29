<?php

namespace App\Livewire\Permissions;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    #[Lazy]
    #[Layout('layouts.app')]
    public function render()
    {

        // $permissions = Role::with('permissions')->latest()->paginate(3);
        $permissions = Permission::with('roles')->latest()->paginate(3);

        return view('livewire.permissions.index', ['permissions' => $permissions]);
    }
}
