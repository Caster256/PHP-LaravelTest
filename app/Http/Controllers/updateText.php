<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class updateText extends Controller
{
    public function index()
    {
        return view('text.index_form');
    }
}
