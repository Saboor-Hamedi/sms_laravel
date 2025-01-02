<?php

namespace App\Livewire\Reports;

use App\Models\Scores as ModelsScores;
use Livewire\Component;
use Spatie\Browsershot\Browsershot;
use Livewire\Attributes\Lazy;

class Scores extends Component
{

    #[Lazy]
    public function downloadReport()
    {
        set_time_limit(120); // Increase the PHP execution time

        // Fetch the scores and include the necessary relationship
        $scores = ModelsScores::with(['academic'])->latest()->get();

        // Render the view with the $scores data
        $html = view('reports.scores-reports', compact('scores'))->render();

        $pdfPath = storage_path('app/public/reports/scores.pdf'); // Correct the path to save the PDF

        // Ensure the directory exists
        if (!file_exists(dirname($pdfPath))) {
            mkdir(dirname($pdfPath), 0755, true);
        }

        try {
            Browsershot::html($html)
                ->format('A4')
                ->timeout(120) // Set timeout to 120 seconds
                ->savePdf($pdfPath);

            return response()->download($pdfPath);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function render()
    {
        return view('livewire.reports.scores');
    }
}
