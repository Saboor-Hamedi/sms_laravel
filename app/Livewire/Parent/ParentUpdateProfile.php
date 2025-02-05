<?php

namespace App\Livewire\Parent;

use App\Models\Parents;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class ParentUpdateProfile extends Component
{
    #[Layout('layouts.app')]
    #[Lazy()]
    public $lastname = '';

    public $phone = '';

    public $address = '';

    public $bio = '';

    public function mount()
    {
        $this->fetchParents();
    }

    public function fetchParents()
    {
        $parent = Parents::where('user_id', Auth::user()->id)->first();
        $this->lastname = $parent->lastname ?? '';
        $this->phone = $parent->phone ?? '';
        $this->address = $parent->address ?? '';
        $this->bio = $parent->bio ?? '';
    }

    public function save()
    {
        try {
            $parent = Parents::firstOrNew(['user_id' => Auth::id()]);
            $originalAttributes = $parent->getAttributes();
            // parepare update data
            $updateData = [
                'user_id' => Auth::id(),
                'lastname' => $this->lastname,
                'phone' => $this->phone,
                'address' => $this->address,
                'bio' => $this->bio,
            ];

            // check if this is a new record
            if (! $parent->exists) {
                $parent->fill($updateData)->save();
                $message = 'Profile created successfully';
            } else {
                // check for actual message
                $changes = array_diff_assoc($updateData, $originalAttributes);
                if (! empty($changes)) {
                    $parent->update($updateData);
                    $message = 'Profile updated successfully';
                } else {
                    $message = 'No changes detected';
                }
            }
            session()->flash('status', [
                'type' => 'success',
                'message' => $message,
            ]);
        } catch (Exception $e) {
            session()->flash('status', [
                'type' => 'error',
                'message' => 'Operation failed. Please try again later.'.$e->getMessage(),
            ]);
        }
    }

    public function rules(Request $request)
    {

        return $this->validate([
            'lastname' => 'required|string|max:30',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'address' => 'nullable|string|max:150',
            'bio' => 'nullable|string|max:150',
        ]);
    }

    public function render()
    {
        return view('livewire.parent.parent-update-profile');
    }
}
