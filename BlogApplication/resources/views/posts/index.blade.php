
@extends('layouts.app')

@section('title','Posts')

@section('content')
<h1>The blog posts of E world:</h1>
<ul>
    @foreach ($posts as $post)
    <li><a href="{{ route('posts.show',['id'=>$post->id])}}">
        {{ $post->title }}</a>
    </li>
    @endforeach
</ul>
{{ $posts->links() }}
@endsection