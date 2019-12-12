@extends('layouts.app')
@section('title',"| $tag->nam Tag")

@section('content')
<br>
<div class="row">
    <div class="col-md-8">
        <h1>{{ $tag->name }} Tag</h1> <samll>{{ $tag->posts()->count()}} Posts </small>
    </div>
    <hr>
    <div class="col-md-2">
        <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-outline-primary float-right btn-block">Edit</a>
    </div>
    <div class="col-md-2">
            <form method="POST" action="{{route('tags.destroy',['id' =>$tag->id]) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger btn-block">
            </form>
     </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($tag->posts as $post)
                <tr>
                    <th>{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>@foreach($post->tags as $tag)
                        <span class="label label-default">#{{ $tag->name }},</span>
                        @endforeach
                    </td>
                    <td><a href="{{ route('posts.show',$post->id)}}" class="btn btn-default btn-outline-primary">View</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection