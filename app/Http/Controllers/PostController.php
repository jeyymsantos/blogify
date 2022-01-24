<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\User;
use Auth;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost(Request $req)
    {
        $post = new post;

        $post -> user_id = Auth::user()->id;
        $post -> name = Auth::user()->name;
        $post -> post = $req -> thoughts;
        $post -> type = $req -> category;
        $post -> profile = Auth::user()->profile;
 
        $post -> save();

        DB::table('posts')
            ->where('user_id', Auth::user()->id)
            ->update(['profile' => Auth::user()->profile]);

        return redirect()->route('home');
    }

    public function loadThoughts(Request $req){
        $post = Post::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('home.thoughts')->with (['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
