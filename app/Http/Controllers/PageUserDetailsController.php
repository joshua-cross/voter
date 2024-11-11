<?php

namespace App\Http\Controllers;

use App\Models\User;

class PageUserDetailsController extends Controller
{
    public function __invoke(User $user)
    {
        return view('user', ['user' => $user]);
    }
}
