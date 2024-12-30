<?php

namespace App\Livewire\Parent;

use App\Livewire\Users\User;
use App\Models\Student;
use App\Models\StudentParent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class StudentParents extends Component
{
    public function render()
    {

        $reports = StudentParent::with(['students'])
            ->paginate(10);
        return view('livewire.parent.student-parents', ['reports' => $reports]);
    }
}
