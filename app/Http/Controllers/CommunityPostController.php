<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommunityPostRequest;
use App\Http\Requests\UpdateCommunityPostRequest;
use Illuminate\Http\Request;
use App\Models\CommunityPost;
use App\Models\Community;

class CommunityPostController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $community = Community::findOrFail($id);

        return view('community.createPost', compact('community'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $validasi = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        if ( $request->file( 'image' ) ) {
            $extension = $request->file( 'image' )->getClientOriginalExtension();
            $originalName = pathinfo( $request->file( 'image' )->getClientOriginalName(), PATHINFO_FILENAME );
            $filename = $originalName . '_' . time() . '.' . $extension;
            $request->file( 'image' )->storeAs( 'public/images', $filename );
        }

        $community = Community::findOrFail($id);

        CommunityPost::create([
            'community_id' => $community->id,
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filename
        ]);

        return redirect('/community/' . $id)->with('success', 'Post has been successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function showDetail($id)
    {
        $post = CommunityPost::findOrFail($id);
        $postCommunityId = $post->community->id;

        $community = Community::findOrFail($postCommunityId);
        return view('community.detailPost', compact('post', 'community'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityPost $communityPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommunityPostRequest $request, CommunityPost $communityPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityPost $communityPost)
    {
        //
    }
}
