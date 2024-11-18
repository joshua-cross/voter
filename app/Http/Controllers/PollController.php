<?php

namespace App\Http\Controllers;

class PollController extends Controller
{
    public function index()
    {
    }

    public function store()
    {
        return view('polls.create');
    }

    public function create()
    {
    }
}
