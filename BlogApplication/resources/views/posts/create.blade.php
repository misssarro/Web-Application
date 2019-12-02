@extends('layouts.app')

@section('title', '| Create new post')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Create New Post</h1>
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group">
                <label name="title" >Title: </label>
                <input id="title" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label name="content">Post content: </label>
                <textarea id="content" name="content" rows="10" class="form-control" value="{{ old('content') }}"></textarea>
            </div>
            <input type="submit" value="Create Post"> 
            <a href ="{{ route('posts.index') }}">Cancel</a>
        </form>
    </div>
</div>

@endsection