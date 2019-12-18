@extends('layouts.app')
@section('title','All Categories')

@section('content')

<div class="row">
   <div class="col-md-8">
        <h1>Categories:</h1>
   </div>
   <hr>
</div>
<div class="row">
    <div class="col-md-8">
        <table class="table table-striped">
            <thead class="table-dark"> 
                <th>#</th>
                <th>Name</th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td> <a href="{{ route('categories.show',$category->id) }}">{{ $category->name }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-center">
            <div>
                {{ $categories ->links() }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well">
        <h2> New Category</h2>
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="form-group">
                <label name="name" >Name: </label>
                <input id="name" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <input type="submit" value="Create New Category"> 
        </form>
        </div>
    </div>
</div>



@endsection