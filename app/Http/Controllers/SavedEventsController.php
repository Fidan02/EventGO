<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SavedEventsController extends Controller
{
    function index() {
        return view('saved-events');
    }
}
