<?php

namespace App\Http\Controllers\temp;

use App\Http\Controllers\Controller;
use App\Models\Scores;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function showReport(Request $request)
    {
        // Fetch the scores
        $scores = Scores::with(['academic'])->where('user_id', auth()->user()->id)->limit(10)->get();
        $html = view('livewire.pdf.report', compact('scores'))->render();
        return response($html);
    }
}
