@extends('layouts.app')
@section('title',"| Edit Comment")

@section('content')
<form action="{{ route('comments.update',$comment->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Comment body:</strong>
                    <input type="text" name="comment_content" value="{{ $comment->comment_content }}" class="form-control" placeholder="comment_content">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
    </div>
</form>
@endsection