@extends('layouts.app')
@section('title','| Homepage')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron bg-dark text-white">
            <h1>Welcome to the blog</h1>
            <p class="lead"> Thank you for visiting. Please read the recent posts</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
            <div class="post">
                <h2>{{ $post->title }}</h2>
                @if($post->post_image !=null)
                 <img src="{{asset('images/'.$post->post_image)}}"height="300" width="300" />
               @endif
                <p>{{ $post->content }}</p>
                <a href="{{ route('posts.show', $post->id)  }}" class="btn btn-primary">Read more</a>
            </div>
            <hr>
            @endforeach
        </div>
    </div>
@endsection
