@extends('layouts.app')

@section('title', '| Create new post')
@section('stylesheets')
    { !! HTML::style('css/select2.min.css') !!}

@endsection

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Create New Post</h1>
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-group">
                <label name="title" >Title: </label>
                <input id="title" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            <label name="category">Category</label>
            <select class="form-control" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id}}"
                        @if ($category->id == old('category_id'))
                            selcted="selected"
                        @endif
                        > {{ $category->name}}
                    </option>
                @endforeach
            </select>
            <br>
            <label name="tags">Tags --You can select multiple tags</label>
            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id}}"
                        @if ($tag->id == old('tag_id'))
                            selcted="selected"
                        @endif
                        > {{ $tag->name}}
                    </option>
                @endforeach
            </select>
            <div class="form-group">
                <label name="content">Post content: </label>
                <textarea id="content" name="content" rows="10" class="form-control" value="{{ old('content') }}"></textarea>
            </div>
            <hr>
            <input type="submit" value="Create Post"> 
            <a href ="{{ route('posts.index') }}">Cancel</a>
        </form>
    </div>
</div>

@endsection
@section('scripts')
    { !! HTML::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

@endsection
