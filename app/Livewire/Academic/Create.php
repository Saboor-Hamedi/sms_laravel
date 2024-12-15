<?php

namespace App\Livewire\Academic;

use App\Models\Academics;
use Livewire\Attributes\Layout;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate('required|digits:4|integer|min:2021|max:9999|unique:academics,year')]
    public $academic_year = '';

    #[Layout('layouts.app')]

    public function save()
    {
        $this->validate();
        // save the academic year to the database
        Academics::create(['year' => $this->academic_year]);
        session()->flash('success', 'Academic year created successfully.');
        $this->reset();
    }
    public function cancel()
    {
        $this->reset();
        return redirect()->route('academics.index');
    }
    public function render()
    {
        return view('livewire.academic.create');
    }
}
