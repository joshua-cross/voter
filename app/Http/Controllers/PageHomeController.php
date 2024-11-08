<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class PageHomeController extends Controller
{
    public function __invoke()
    {
        $polls = Poll::all();
        return view('welcome', compact('polls'));
    }
}
