<?php

namespace App\Http\Controllers\temp;

use App\Http\Controllers\Controller;
use App\Models\Scores;

class PDFController extends Controller
{
    public function scorePDF()
    {
        $scores = Scores::with(['academic'])
            ->latest()->get();

        return view('reports.scores-reports', compact('scores'));
    }
}
