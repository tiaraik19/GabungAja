<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Community;
use App\Models\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function join($id)
    {
        $user_id = auth()->id();
        $community = Community::findOrFail($id);

        Member::create([
            'community_id' => $community->id,
            'user_id' => $user_id,
        ]);

        return redirect('/community/' . $id)->with('success', 'You are now part of ' . $community->name);
    }

    public function leave($id)
    {
        $user_id = auth()->id();
        $community = Community::findOrFail($id);

        $member = Member::where('community_id', $community->id)
        ->where('user_id', $user_id)
        ->first();

        if ($member) {
            $member->delete();
            return redirect('/community/' . $id)->with('loginError', 'You have left the community ' . $community->name);
        }
    }

    public function showMembers($id) {
        $community = Community::findOrFail($id);
        $members = Member::where('community_id', $id)->with('user')->get();
    
        return view('community.memberView', compact('community', 'members'));
    }


    public function delete($id)
    {
        $member = Member::findOrFail($id);

        $community_id = $member->community_id;

        Member::destroy($id);

        return redirect('/showMember/' . $community_id)->with('success', 'Member has been removed successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        //
    }


}
