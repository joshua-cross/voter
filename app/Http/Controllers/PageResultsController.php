<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class PageResultsController extends Controller
{
    public function __invoke(Poll $poll)
    {
        return view('results', compact('poll'));
    }
}
