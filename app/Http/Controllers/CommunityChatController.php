<?php

namespace App\Http\Controllers;

use App\Models\CommunityChat;
use App\Models\Community;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityChatController extends Controller
{
    public function chatList($id)
    {
        $user = User::findOrFail( $id );
        if ( Auth::user()->id === $user->id ) {
            $communities = $user->communities;
            return view( 'community.chattingList', compact('communities' ) );
        }
    }

    public function show(Community $community)
    {
        $chats = $community->chats()->with('user')->get();
        return view('community.communityChat', compact('community', 'chats'));
    }

    public function store(Request $request, Community $community)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        CommunityChat::create([
            'community_id' => $community->id,
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        return redirect('/communities/' . $community->id . '/chats');
    }
}