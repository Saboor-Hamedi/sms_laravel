<?php

namespace App\Livewire\Pdf;

use App\Models\Scores;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Spatie\Browsershot\Browsershot;

class ScoringReports extends Component
{

    public function downloadPDF()
    {
        $scores = Scores::where('user_id', auth()->user()->id)->limit(10)->get();
        $request = Browsershot::url('livewire.pdf.reports.pdf');
        $res = $request->saveAs(Storage::path('scores.pdf'));
    }

    public function render()
    {
        return view('livewire.pdf.scoring-reports');
    }
}
