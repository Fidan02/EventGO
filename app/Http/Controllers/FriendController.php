<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friends;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\JoinClause;

class FriendController extends Controller
{
    function getUsers(){
        $authUserId = auth()->id();
    
        return DB::table('users')
            ->whereNotIn('id', function ($query) use ($authUserId) {
                $query->select('user_id')
                    ->from('friends')
                    ->where('friend_id', $authUserId)
                    ->where('status', 'accepted')
                    ->union(function ($query) use ($authUserId) {
                        $query->select('friend_id')
                            ->from('friends')
                            ->where('user_id', $authUserId)
                            ->where('status', 'accepted');
                    })
                    ->union(function ($query) use ($authUserId) {
                        $query->select('friend_id')
                            ->from('friends')
                            ->where('user_id', $authUserId)
                            ->where('status', 'pending');
                    })
                    ->union(function ($query) use ($authUserId) {
                        $query->select('user_id')
                            ->from('friends')
                            ->where('friend_id', $authUserId)
                            ->where('status', 'pending');
                    });
            })
            ->where('id', '<>', $authUserId)
            ->inRandomOrder()
            ->limit(5)
            ->get();
    }
    function index() {
        $friends_requests = Friends::where('friend_id', auth()->id())->where('user_id', '!=', auth()->id())->where('status', 'pending')->get();
        $friends = Friends::where(function ($query) {
            $query->where('user_id', auth()->id())
            ->orWhere('friend_id', auth()->id());
        })->where('status', 'accepted')->get();
        $people = $this->getUsers();
    
        return view('friends', [
            'friendRequests' => $friends_requests,
            'friends' => $friends,
            'people' => $people
        ]);
    }

    function accept($id){
        $friend = Friends::where('status', 'pending')
        ->where(function ($test) use ($id) {
            $test->where('user_id', auth()->id())
                ->where('friend_id', $id)
                ->orWhere('user_id', $id)
                ->where('friend_id', auth()->id());
        })
        ->first();
        if($friend){
            $friend->status = 'accepted';
            $friend->save();
            return redirect()->back()->with('success', 'Made a new friend!');
        }

        return redirect()->back();
    }
    function unfriend($id){
        $friend = Friends::where('friend_id', $id)->first();
        $friend->delete();

        return redirect()->back()->with('removed', 'Removed Friend!');
    }
    function addFriend($id){
        Friends::create([
            'user_id' => auth()->id(),
            'friend_id' => $id
        ]);

        return redirect()->back()->with('added', 'Request Sent!');
    }
}
