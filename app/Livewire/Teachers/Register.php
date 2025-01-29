<?php

namespace App\Livewire\Teachers;

use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class Register extends Component
{
    #[Layout('layouts.app')]
    #[Lazy]
    public $lastname;

    public $birthdate;

    public $phone;

    public $country;

    public $state;

    public $address;

    public $description;

    public function mount()
    {
        $teacher = Teacher::with('user')->where('user_id', Auth::id())->first();
        $this->lastname = $teacher->lastname ?? '';
        $this->birthdate = $teacher->birthdate ?? '';
        $this->phone = $teacher->phone ?? '';
        $this->country = $teacher->country ?? '';
        $this->state = $teacher->state ?? '';
        $this->address = $teacher->address ?? '';
        $this->description = $teacher->description ?? '';
    }

    public function update()
    {
        $this->rules();

        $teacher = Teacher::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'lastname' => $this->lastname,
                'birthdate' => $this->birthdate,
                'phone' => $this->phone,
                'country' => $this->country,
                'state' => $this->state,
                'address' => $this->address,
                'description' => $this->description,
            ]
        );

        session()->flash('success', $teacher->wasRecentlyCreated ? 'Profile created successfully.' : 'Profile updated successfully.');
    }

    public function rules()
    {
        $this->validate(
            [
                'lastname' => 'required',
                'birthdate' => 'date',
                'phone' => 'required',
                'country' => 'required',
                'state' => 'required',
                'address' => 'required',
                'description' => 'required',

            ]
        );
    }

    public function cancel()
    {
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.teachers.register');
    }
}
