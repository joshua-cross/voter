<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        
    }

    public function create(Request $request) {
        $request->validate([
            'option_id' => 'required',
            'user_id' => 'required'
        ]);
    }
}
