<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\User;

class PageUserDetailsController extends Controller
{
    public function __invoke(User $user)
    {
        $polls = Poll::where('user_id', $user->id)->paginate(10);
        return view('user', ['user' => $user, 'polls' => $polls]);
    }
}
