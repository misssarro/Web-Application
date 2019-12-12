@extends('layouts.app')
@section('title',"| Edit Tag")

@section('content')
<form action="{{ route('tags.update',$tag->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tag Name:</strong>
                    <input type="text" name="name" value="{{ $tag->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
    </div>
</form>
@endsection