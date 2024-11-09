<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class PagePollDetailsController extends Controller
{
    public function __invoke(Poll $poll)
    {
        return view("poll", ['poll' => $poll]);
    }
}
