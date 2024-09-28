<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\CommunityPost;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class CommunityController extends Controller {

    public function index($id) {
        $community = Community::findOrFail($id);
        $members = Member::where('community_id', $id)->with('user')->take(3)->get();
        $membersCount = Member::where('community_id', $id)->with('user')->get();
        $posts = CommunityPost::where('community_id', $id)->get();

        $isMember = Member::where('community_id', $id)->where('user_id', auth()->id())->exists();
    
        return view('community.community', compact('community', 'members', 'isMember', 'posts', 'membersCount'));
    }
    

    public function create() {
        return view( 'community.createCommunity' );
    }

    public function store( Request $request ) {
        $validasi = $request->validate( [
            'name' => 'required|unique:communities',
            'motto' => 'required',
            'category' => 'required',
            'description' => 'required',
            'location' => 'required',
            'logo' => 'required|image',
        ] );

        $currentUid = auth()->id();

        $filename = null;

        if ( $request->file( 'logo' ) ) {
            $extension = $request->file( 'logo' )->getClientOriginalExtension();
            $originalName = pathinfo( $request->file( 'logo' )->getClientOriginalName(), PATHINFO_FILENAME );
            $filename = $originalName . '_' . time() . '.' . $extension;
            $request->file( 'logo' )->storeAs( 'public/logo', $filename );
        }

        $community = Community::create( [
            'user_id' => $currentUid,
            'name' => $request->name,
            'motto' => $request->motto,
            'category' => $request->category,
            'description' => $request->description,
            'location' => $request->location,
            'logo' => $filename,
        ] );

        Member::create( [
            'community_id' => $community->id,
            'user_id' => $currentUid,
        ] );

        return redirect( '/home' )->with( 'success', 'Community has been created successfully!' );
    }

    public function search(Request $request)
    {
        $communities = Community::query();
    
        if ($request->has('search')) {
            $searchTerm = $request->search;
    
            $communities->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('location', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhere('category', 'LIKE', '%' . $searchTerm . '%')
                      ->orWhereHas('user', function ($userQuery) use ($searchTerm) {
                          $userQuery->where('username', 'LIKE', '%' . $searchTerm . '%');
                      });
            });
        }
    
        $communities = $communities->paginate();
    
        return view('main.home', compact('communities'));
    }
    

    public function show() 
    {
        $communities = Community::all();

        return view( 'main.home', compact( 'communities' ) );
    }

    public function delete($id) {
        $community = Community::findOrFail($id);

        Community::destroy($community->id);

        return redirect('/home')->with('success', 'Community ' . $community->name . ' has been deleted');
    }

    public function editDescription($id)
    {
        $community = Community::findOrFail( $id );
        $members = Member::where('community_id', $id)->with('user')->take(3)->get();
        $posts = CommunityPost::where('community_id', $id)->get();

        $isMember = Member::where('community_id', $id)->where('user_id', auth()->id())->exists();

        return view( 'community.editDescription', compact( 'community' , 'members' , 'posts', 'isMember') );
    }

    public function updateDescription(Request $request , $id){

        $community = Community::findOrFail( $id );

        $request->validate( [
            'description' => 'required',
        ] );

        $community->update( [
            'description' => $request->description
        ] );
        return redirect( '/community/'. $id )->with( 'success', 'Description has been updated successfully' );
    }
    public function changeCommunityLogo(Request $request, $id) {
        if (auth()->id() == $id) {
            $validasi = $request->validate([
                'logo' => 'required|image', // Adding 'image' validation to ensure the uploaded file is an image
            ]);
    
            $community = Community::findOrFail($id);
    
            $currentLogo = $community->logo;
    
            $filename = null;
            if ($request->file('logo') != null) {
                $extension = $request->file('logo')->getClientOriginalExtension();
                $originalName = pathinfo($request->file('logo')->getClientOriginalName(), PATHINFO_FILENAME);
                $filename = $originalName . '_' . time() . '.' . $extension;
                $request->file('logo')->storeAs('public/logo', $filename);
            }
    
            $community->update([
                'logo' => $filename,
            ]);
    
            if ($currentLogo) {
                Storage::delete('public/logo/' . $currentLogo);
            }
    
            return redirect('/community/' . $id)->with('success', 'Community Logo has been updated successfully!');
        }
    }
    
}
