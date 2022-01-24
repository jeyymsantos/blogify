<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Profile;
use App\User;
use App\Post;
use DB;
use Auth;

class ProfileController extends Controller
{
    public function storeProfile(Request $req){
        
        $profile = new profile;

        $profile -> user_id = Auth::user()->id;
        
        $file = $req->profile;
        $extension = $file->getClientOriginalExtension();
        $filename = Auth::user()->id . '.' . $extension;
        $file -> move('img/profile/icons/', $filename);
        
        $profile->profile = $filename;

        $profile -> save();

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['profile' => $filename]);

        DB::table('posts')
            ->where('user_id', Auth::user()->id)
            ->update(['profile' => $filename]);

        return redirect()->route('home');
    }

    public function loadProfile(){
        $profile = Profile::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first();
        $post = Post::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('home.profile')->with(['profile' => $profile])->with(['post' => $post]);
    }

    public function viewProfile($id){
        $profile = Profile::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->first();
        $post = Post::where('user_id', $id)->orderBy('id', 'DESC')->get();
        return view('home.view')->with(['profile' => $profile])->with(['post' => $post]);
    }
}
