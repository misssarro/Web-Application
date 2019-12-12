@extends('layouts.app')

@section('title','Post details')


@section('content')
<div class="row">
    <div class="col-md-8">
    <h1>{{ $post->title }}</h1>
    <p class="lead">{{$post->content }}</p>
</div>
<div class="col-md-4">
    <div class="well">
        <dl class="dl-horizontal">
            <dt>Create at: {{ date('M j, Y h:ia',strtotime($post->created_at)) }} </dt>
        </dl>
        <dl class="dl-horizontal">
            <dt>Last updated at: {{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dt>
        </dl>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <form method="POST" action="{{ route('posts.edit',['id'=> $post->id‘]) }}">
                    @csrf
                    <input type="submit" value="Edit" class="btn btn-primary btn-block">
                </form>
            </div>
            <div class="col-sm-6">
            <form method="POST" action="{{route('posts.destroy',['id' =>$post->id]) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger btn-block">
            </form>
            </div>
            <div class="row">
                <div class="col-sm-12 ">
                    <br>
                    <a  href="{{route('posts.index') }}" class=" btn btn-primary mx-auto d-block">Show all posts</a>
                </div>
            </div>
    </div>
</div>
</div>

@endsection