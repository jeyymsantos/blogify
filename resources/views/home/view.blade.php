@extends('layouts.master-home')

@section('title')
        <title> Blogify - View </title>
@endsection

@section('css')
        <link rel="stylesheet" href="css/profile.css" type="text/css">
        <link rel="stylesheet" href="css/home.css" type="text/css">
@endsection

@section('content')

    <div class="container">
        <div class="row cover-photo"></div>
        <div class="row">
            <div class="col-3">
                <img src="img/profile/icons/{{ !is_null($profile) ? Auth::user()->profile : 'default.jpg' }}" class="icon">
            </div>

            <div class="col-9 mt-4">
               <h1>{{ Auth::user()->name }} </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <form method="POST" action="upload_profile" enctype="multipart/form-data">
                    @csrf
                        <input style="margin: auto; display:block;" type="file" class="mt-3 form-control" name="profile" required>
                        <button style="margin: auto; display:block;" class="my-2 btn-success" type="submit"> Upload Profile Picture </button>
                </form>
            </div>

        </div>

    </div>

<!-- Thoughts -->
@foreach($post as $thought)
<div class="container thoughts mt-3 pt-4">
        <div class="row">
            <div class="col-1"> 
                <img src="img/profile/icons/{{ !is_null($thought) ? $thought->profile : 'default.jpg' }}"/>
            </div>
        
            <div class="col-9">
                <h2 class="mt-2 pb-2"><b>{{ !is_null($thought) ? $thought->name : '-' }}</b> <span id="bullet"> • </span><span id="type" class="align-middle">{{ !is_null($thought) ? $thought->type : '-' }} </span></h2>
            </div>

            <div class="col-2">
                <h6 class="mt-2 pb-2">{{ !is_null($thought) ? $thought->created_at->format('h:i A') : '-' }}</h6>
            </div>

            <hr style="width:90%;margin-left:10%" />
        </div>
    
        
        <div class="row px-4 underline mb-3">
            <p> {{ !is_null($post) ? $thought->post : '-' }}</p>
        </div>

        <div class="row px-4 mb-3 justify-content-center">
        Posted on: {{ !is_null($thought) ? \Carbon\Carbon::parse($thought->created_at)->format('F j, Y') : '-' }}
        </div>
    </div>
@endforeach



@endsection
