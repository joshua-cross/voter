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
            ->paginate(10);

        return view('welcome', [
            'polls' => $polls,
            "loggedIn" => (bool) auth()->user(),
        ]);
    }
}
