<?php

namespace App\Livewire\Parent;

use App\Models\Parents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;
use Propaganistas\LaravelPhone\Rules\Phone;

class RegisterProfile extends Component
{

    #[Layout('layouts.app')]
    #[Lazy()]
    public $lastname  = '';
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
        $parent = Parents::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'lastname' => $this->lastname,
                'phone' => $this->phone,
                'address' => $this->address,
                'bio' => $this->bio,
            ]
        );
        session()->flash('success', $parent->wasRecentlyCreated ? 'Profile created successfully.' : 'Profile updated successfully.');
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
        return view('livewire.parent.register-profile');
    }
}
