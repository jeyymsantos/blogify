@extends('layouts.master-home')

@section('title')
        <title> Blogify - Home </title>
@endsection

@section('css')
        <link rel="stylesheet" href="css/home.css" type="text/css">
@endsection

@section('content')


<!-- Writing Thoughts -->
    <div class="container write-thoughts mt-3 pt-4">
        <div class="row">
            <div class="col-2"> 
                <img src="img/profile/icons/{{ !is_null($post) ? Auth::user()->profile : 'default.jpg' }}"/>
            </div>
        
    <!-- Creating Form -->
            <div class="col-10">
                <form method="POST" action="create_post">
                @csrf
                    <textarea placeholder="Any thoughts?" name="thoughts" required></textarea>
                </div>
            </div>
        
            <div class="row">
                <div class="col-6">
                    <select name="category" class="form-select" required>
                        <option selected value="Personal">Personal</option>
                        <option value="Random">Random</option>
                        <option value="Tech">Tech</option>
                    </select>
                </div>

                <div class="col-6">
                    <button class="btn btn-dark" type="submit">Thought</button>
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
                <h2 class="mt-2 pb-2"><b>
                        {{ !is_null($thought) ? $thought->name : '-' }}</b> 
                    
                    <span id="bullet"> • </span>
                    <span id="type" class="align-middle">
                        {{ !is_null($thought) ? $thought->type : '-' }} 
                    </span>
                </h2>
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
