@extends('layouts.app')
@section('title',"| $category->name Category")

@section('content')
<br>
<div class="row">
    <div class="col-md-8">
        <h1>{{ $category->name }} Category</h1> <samll>{{ $category->posts()->count()}} Posts </small>
    </div>
    <hr>
    <div class="col-md-2">

        <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-outline-primary float-right btn-block">Edit</a>
        
    </div>
    <div class="col-md-2">
            <form method="POST" action="{{route('categories.destroy',['id' =>$category->id]) }}">
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($category->posts as $post)
                <tr>
                    <th>{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td><a href="{{ route('posts.show',$post->id)}}" class="btn btn-default btn-outline-primary">View</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection