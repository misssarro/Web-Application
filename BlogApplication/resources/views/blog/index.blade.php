@extends('layouts.app')
@section('title','| Blog')

@section('conten')

        <div class="row">
            <div class= "col-md-12">
                <h1>Blog</h1>
            </div>
        </div>
        @foreach($posts as $post)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>{{ $post->title }}</h2>
                <h5>Published: {{ date('M j, Y',strtotime($post->created_at)) }}</h5>
                <p>{{ $post->content }}</p>
                <a href=" {{ route('posts.show', $post->id) }}">Read more</a>
            </div>
        </div>
        @endforeach
@endsection