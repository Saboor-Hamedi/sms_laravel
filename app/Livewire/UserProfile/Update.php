<?php

namespace App\Livewire\UserProfile;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\Lazy;
/*
    - This is the livewire component for updating the user profile.
    - It has a form to update the user profile.
    - It validates the form data and updates the record in the database.
    - It belongs to all users
    - It has a cancel button to redirect to the user profile page.
*/

class Update extends Component
{
    #[Lazy]
    #[Layout('layouts.app')]
    #[Validate('required|min:2|max:50')]
    public $lastname = '';

    #[Validate('required|min:2|max:50')]
    public $country = '';

    #[Validate('required|min:2|max:50')]
    public $state = '';
    #[Validate('required|min:2|max:100')]
    public $address = '';
    #[Validate('required|nullable|min:2|max:255')]
    public $description = '';


    /*
    *  mount method to set the initial values of the form.
    *  It gets the student record from the database and sets the values of the form.
    */
    public function mount()
    {
        $student = Student::with('user')->where('user_id', Auth::id())->first();
        $this->lastname = $student->lastname ?? '';
        $this->country = $student->country ??  '';
        $this->state = $student->state ?? '';
        $this->address = $student->address ?? '';
        $this->description = $student->description ?? '';
    }
    /*
    *  update method to update the student record in the database.
    *  It validates the form data and updates the student record in the database.
    */
    public function update()
    {
        $this->validate();

        try {
            $student = Student::updateOrCreate(
                ['user_id' => Auth::id()],
                [
                    'lastname' => $this->lastname,
                    'country' => $this->country,
                    'state' => $this->state,
                    'address' => $this->address,
                    'description' => $this->description,
                    'is_active' => true,
                ]
            );

            session()->flash('success', $student->wasRecentlyCreated ? 'Profile created successfully.' : 'Profile updated successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong. Please try again later.');
        }
    }

    public function cancel()
    {
        return redirect()->route('user-profile.index');
    }
    public function render()
    {
        return view('livewire.user-profile.update');
    }
}
