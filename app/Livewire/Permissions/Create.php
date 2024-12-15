<?php

namespace App\Livewire\Permissions;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission as ModelsPermission;

class Create extends Component
{


    #[Validate('required|unique:permissions,name')]
    public $name;

    public $permissionId = '';

    #[Layout('layouts.app')]

    public function save()
    {
        $this->validate();

        try {
            ModelsPermission::create(['name' => $this->name]);
            $this->reset();
            session()->flash('success', 'Permission created successfully.');

            return redirect()->route('permissions.index');
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred while creating the permission. Please try again.');
            return redirect()->route('dashboard');
        }
    }

    public function delete($id) {}
    public function cancel()
    {
        $this->reset();
        return redirect()->route('permissions.index');
    }
    public function render()
    {
        return view('livewire.permissions.create');
    }
}
