<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friends;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    function getSenders(){
        $senders = [];
        $results = DB::table('messages')->distinct()->where('reciever_id', auth()->id())->get(['sender_id'])->toArray();

        foreach($results as $res){
            $senders[] = $res->sender_id;
        }

        return $senders;

    }

    function index() {
        $friends = Friends::where(function ($query) {
            $query->where('user_id', auth()->id())
            ->orWhere('friend_id', auth()->id());
        })->where('status', 'accepted')->get();
        $messagers = User::all();
        $users = User::whereIn('id', $this->getSenders())->get();
        return view('messages', [
            'users' => $users,
            'messagers' => $messagers,
            'friends' => $friends 
        ]);
    }

    function sendMessage(Request $request){
        $this->validate($request, [
            'message' => 'required|min:2|max:255'
        ]);
        
        if(isset($request->sender_id) && ($request->sender_id > 0)){
        Message::create(['sender_id' => auth()->id(), 'reciever_id' => $request->sender_id, 'message' => $request->message]);
        }

        if(isset($request->reciever_id) && ($request->reciever_id > 0)){
            Message::create(['sender_id' => auth()->id(), 'reciever_id' => $request->reciever_id, 'message' => $request->message]);
        }
        return redirect()->back();
    }


    function deleteMessage($sender_id){

    }
}
