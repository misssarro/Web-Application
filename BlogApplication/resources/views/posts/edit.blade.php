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
    <a class="btn btn-primary" href="{{ route('posts.index') }}">Back</a>
</div>
</div>
        <div class="row">
            <div class="col-sm-6">
                <form  action="{{ route('posts.update',$post->id) }}" method="POST">
                    <!--<input type="hidden" name="_method" value="PUT">-->
                    @csrf
                    @method('PUT')
                    <div class= "form-group">
                        <label for="title">Title: </label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}"/>
                    </div>
                    <div class="form-group">
                        <label for="content">Body</label>
                        <input type="textarea" class="form-control" name="content" value="{{$post->content}}"/>
                    </div>
                    <select  name="category_id">
                         @foreach ($categories as $key=>$value)
                         <option value="{{$key}}" {{($key =$post->category_id) ? "selected" : ""}}>{{$value}}</option>
                         @endforeach  
                    </select>
                    <br>
                    <select name="tags">
                    @foreach ($tags as $key=>$value)
                         <option  class="form-control select2-multi" value="{{$key}}" {{($key =$post->tags) ? "selected" : ""}}>{{$value}}</option>
                         @endforeach  
                    </select>
                 </form>
            </div>
            <div class="form-group">
                    <input type="submit" value="Save changes" class="btn btn-success byn-block">
            </form>
            </div>
    </div>
</div>
</div>

@endsection
@section('scripts')
    { !! HTML::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! jason.encode($post->tags()->getRelatedIds()) !!}).trigger('change');
    </script>
@endsection




