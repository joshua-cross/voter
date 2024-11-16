<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
    public function index()
    {
    }

    public function create(Request $request)
    {
        $request->validate([
            'option_id' => 'required',
        ]);

        $user = Auth::id();

        // make sure a response does not already exist for this poll.
        $option = Option::find($request->option_id);
        $responses = $option->responses;
        $responseForUser = $responses->where('user_id', $user)->first();

        if (!empty($responseForUser)) {
            return redirect(route("home"));
        }

        $newResponse = Response::create([
            'user_id' => $user,
            'option_id' => $request->option_id,
        ]);

        return redirect(route("results", $option->poll->id));
    }
}
