@extends('layouts.app')

@section('title','Posts')

@section('content')
<p>The blog posts of E world:</p>
<ul>
    @foreach ($posts as $post)
    <li><a href="{{ route('posts.show',['id'=>$post->id])}}">
        {{ $post->title }}</a>
    </li>
    @endforeach
</ul>

@endsection