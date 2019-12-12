@extends('layouts.app')

@section('title',"| $post->title")


@section('content')
<br>
<div class="row">
    <div class="col-md-8">
    <h1>{{ $post->title }}</h1>
    <small> Posted by:{{ $post->user->name}}</small>
    <p>Posted in: {{$post->category->name}}</p>
    <div class="tags">
        @foreach($post->tags as $tag)
             <span class="label label-info"># {{ $tag->name }}</span>
        @endforeach
    <p class="lead">{{$post->content }}</p>
    <hr>
    <h5>Comments<small> {{$post->comments()->count()}} total </small></h5>

    <div class="comments">
        <ul class="list-group">
           @foreach($post->comments as $comment)
            <li class="list-group-item">
                <p>by {{ $comment->name }} {{ date( 'M j, Y h:ia',strtotime($comment->created_at)) }} &nbsp;</strong></p>
                {{ $comment-> comment_content}}
            </li>
        @endforeach
        </ul>
    </div>
    <br/>
    <div class="row">
            <div class="col-md-8">
                 <form method="POST" action="{{ route('comments.store',$post->id) }}">
                @csrf
                 <div class="form-group">
                     <label name="name" >Name: </label>
                     <input id="name" name="name" class="form-control" value="{{ old('name') }}">
                 </div>
                 <div class="form-group">
                     <label name="email" >Email: </label>
                     <input id="email" name="email" class="form-control" value="{{ old('email') }}">
                 </div>
                <div class="form-group">
                <textarea id="content" placeholder="Your comment here" name="content"  class="form-control" value="{{ old('comment_content') }}"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
            </div>
        </div>
        </div>
</div>
<div class="col-md-4">
    <div class="well">
        <dl class="dl-horizontal">
            <dt>Create at: {{ date('M j, Y h:ia',strtotime($post->created_at)) }} </dt>
        </dl>
        <dl class="dl-horizontal">
            <dt>Category: {{ $post->category->name }} </dt>
        </dl>
        <dl class="dl-horizontal">
            <dt>Last updated at: {{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dt>
        </dl>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <form method="POST" action="{{ route('posts.edit' ,$post->id) }}">
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
                <div class="col-md-12 ">
                    <br>
                    <a  href="{{route('posts.index') }}" class=" btn btn-primary mx-auto d-block">Show all posts</a>
                </div>
            </div>
    </div>
</div>
</div>
</br>

@endsection