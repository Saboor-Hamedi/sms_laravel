<?php

namespace App\Livewire\Academic;

use App\Models\Academics;
use App\Models\Scores;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Show extends Component
{
    // Show score by academic year
    #[Validate('required|digits:4|integer|min:2021|max:9999|unique:academics,year')]
    public $year = '';
    public $academic_year_id = '';
    public function mount($year)
    {
        $this->year = $year;
        $academic_year = Academics::where('year', $year)->first();
        if ($academic_year) {
            $this->academic_year_id = $academic_year->id;
        } else {
            abort(404, 'Academic year not found');
        }
    }
    public function render()
    {
        $scores = Scores::with(['academic'])
            ->where('academic_year_id', $this->academic_year_id)
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(3);
        return view('livewire.academic.show', ['scores' => $scores])->layout('layouts.app');
    }
}
