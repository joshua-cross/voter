<?php

namespace App\Http\Controllers;

use App\Models\Poll;

class PageHomeController extends Controller
{
    public function __invoke()
    {
        $polls = Poll::active()
            ->public()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('welcome', compact('polls'));
    }
}
