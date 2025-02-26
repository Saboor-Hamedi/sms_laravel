<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Update extends Component
{
    #[Lazy()]
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
        $this->country = $student->country ?? '';
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
        // Show placeholder
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
        return redirect()->route('student.profile');
    }
    public function render()
    {
        return view('livewire.student.update');
    }
}
