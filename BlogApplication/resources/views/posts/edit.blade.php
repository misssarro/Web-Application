@extends('layouts.app')
@section('title','Edit Blog Post')

@section('stylesheets')
    { !! HTML::style('css/select2.min.css') !!}

@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
    <h1>Edit Post</h1>
</div>
<div class="pull-right">
    <a class="btn btn-primary" href="{{ route('posts.index') }}">Back to blog posts</a>
</div>
</div>
        <div class="row">
            <div class="col-sm-6">
                <form  action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data" >
                    <!--<input type="hidden" name="_method" value="PUT">-->
                    @csrf
                    @method('PUT')
                    <div class= "form-group">
                        <label for="title">Title: </label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}"/>
                    </div>
                    <label for="category">Category</label>
                    <br/>
                    <select  name="category_id"> 
                         @foreach ($categories as $key=>$value)
                         <option value="{{$key}}" {{($key =$post->category_id) ? "selected" : ""}}>{{$value}}</option>
                         @endforeach  
                    </select>
                    <div class="form-group">
                        <label for="content">Body</label>
                        <textarea id="content" class="form-control" rows="5" name="content" >{{$post->content}}</textarea>
                    </div>
                    <label>Upload Post Image</label>
                    <input type="file" name="post_image">
                    <br/>
                    <hr>
                    <div class="form-group">
                   <button type="submit" class="btn btn-primary">Save changes</button>
            
            </div>
                 </form>
            </div>
            
    </div>
</div>
</div>

@endsection





