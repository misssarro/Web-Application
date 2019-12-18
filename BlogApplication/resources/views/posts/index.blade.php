
@extends('layouts.app')

@section('title','Posts')

@section('content')
<br>
<div class="row">
   <div class="col-md-10">
        <h1>The blog posts of E world:</h1>
   </div>
   
   <div class="col-md-2">
        <a href="{{ route('posts.create') }}" class=" btn btn-block btn-primary btn-sm">Create New Post</a>
   </div>
   <hr>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead class="thead-dark">
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th>{{ $post->id }}</th>
                        <td> {{ $post->title }}</td>
                        <td>{{ substr($post->content,0,50)}}{{ strlen($post->body) > 50 ? "..." : " "}}</td>
                        <td> {{ date('M j,Y',strtotime($post->created_at)) }}</td>
                        <td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-default btn-sm btn-outline-primary" >View</a>
                       @can('update',$post)
                            <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-default btn-sm btn-outline-primary ">Edit</a>
                       @endcan
                        </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-center" >
            <div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>

</div>

@endsection