<?php

namespace App\Livewire\Permissions;

use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission as ModelsPermission;

class Edit extends Component
{

    #[Validate('required|string|max:50')]
    public $name = '';
    public $permissionId;

    #[Layout('layouts.app')]
    public function mount($id)
    {
        // if (!Auth::user()->hasRole(['admin'])) {
        //     $this->redirect('/dashboard');
        // }
        $this->update($id);
    }
    public function update($id)
    {
        $permission = ModelsPermission::findOrFail($id);
        $this->permissionId = $permission->id;
        $this->name  = $permission->name;
    }
    public function edit()
    {
        $this->validate();

        $permission = ModelsPermission::findOrFail($this->permissionId);
        $permission->update([
            'name' => $this->name,
        ]);
        session()->flash('success', 'Permission updated successfully');
        return redirect()->route('permissions.index');
    }

    public function cancel()
    {
        $this->reset();
        return redirect()->route('permissions.index');
    }

    public function render()
    {
        return view('livewire.permissions.edit');
    }
}
