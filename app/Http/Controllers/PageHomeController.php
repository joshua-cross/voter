<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Carbon\Carbon;

class PageHomeController extends Controller
{
    public function __invoke()
    {
        $polls = Poll::where("public", true)
            ->where("expiry_date", ">=", Carbon::now())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('welcome', compact('polls'));
    }
}
