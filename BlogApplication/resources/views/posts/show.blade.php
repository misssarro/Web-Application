@extends('layouts.app')

@section('title','Post details')


@section('content')
<ul>
    <li>Title: {{ $post->title }}</li>
    <li>Content: {{$post->content }}</li>
</ul>


@endsection