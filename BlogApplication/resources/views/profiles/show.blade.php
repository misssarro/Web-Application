@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
           <img src="{{asset('images/'.$user->profile_pic)}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
           <h2>{{ $user->name }}'s Profile</h2>
            <form enctype="multipart/form-data" action="{{ route('profiles.update') }}" method="POST">
                 @csrf
                 @method('PUT')
                <label>Update Profile Image</label>
                <input type="file" name="profile_pic">
                <input type="submit" value="Save Profile Picture" class="pull-right btn btn-sm btn-primary"></input>
            </form>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
    <h2>{{ $user->name }}'s Posts</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <a href="{{ route('posts.create') }}" class=" btn btn-default btn-outline-primary " style="float:right">Create New Post</a>
                @foreach($user->posts as $post)
                <tr>
                    <th>{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td><a href="{{ route('posts.show',$post->id)}}" class="btn btn-default btn-outline-primary  mr-1">View </a><a href="{{ route('posts.edit',$post->id)}}" class="btn btn-default btn-outline-primary">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection