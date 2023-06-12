<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class settingsController extends Controller
{
    //
    public function index()
    {
        return view('pages.settings');
    }
}
