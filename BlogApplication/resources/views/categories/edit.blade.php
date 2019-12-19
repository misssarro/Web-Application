@extends('layouts.app')
@section('title',"| Edit Category")

@section('content')
<form action="{{ route('categories.update',$category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category Name:</strong>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                @can('update',$category)
                <button type="submit" class="btn btn-primary">Save changes</button>
                @endcan
            </div>
    </div>
</form>
@endsection