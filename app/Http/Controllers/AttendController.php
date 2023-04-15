<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendController extends Controller
{
    function index($id){
        return view('attendingEvents', [
            'id' => (!empty($id)) ? $id : redirect()->route('home.index'),
        ]);
    }
}
