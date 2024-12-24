<?php

namespace App\Livewire\Reports;

use App\Models\Student;
use App\Models\StudentReport;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ReportStudents extends Component
{
    use WithPagination;
    const CACHE_KEY = 'report-students';
    const CACHE_TIME = 60;

    #[Layout('layouts.app')]
    public function render()
    {
        // find or fail the student
        $reports = Student::with(['reports', 'user'])
            ->paginate(10);
        return view(
            'livewire.reports.report-students',
            [
                'reports' => $reports,
            ]
        );
    }
}
