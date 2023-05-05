<?php

namespace App\Http\Controllers;

use App\Models\Attending;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class AttendController extends Controller
{
    function index(){
        $users = User::where('id', auth()->id())->first();
        return view('attendingEvents', [
            'events' => $users
        ]);
    }
}
