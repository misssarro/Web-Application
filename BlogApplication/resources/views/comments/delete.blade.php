@extends('layouts.app')
@section('title',"| Delete Comment")

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3>Are you sure you want to delete this comment?</h3>
        <p>
            <strong>Name: </strong>{{$comment->user->name}}<br>
            <strong>Comment: </strong>{{$comment->comment_content}}
        </p>
        <form action="{{ route('comments.destroy',$comment->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Comment</button>
        </form>
    </div>
</div>
@endsection