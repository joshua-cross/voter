<?php

namespace App\Http\Controllers;

class PageLoginController extends Controller
{
    public function __invoke()
    {
        return view('login');
    }
}
