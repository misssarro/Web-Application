@extends('layouts.app')
@section('title','All Categories')

@section('content')

<div class="row">
   <div class="col-md-8">
        <h1>Tags:</h1>
   </div>
   <hr>
</div>
<div class="row">
    <div class="col-md-8">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Name</th>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show',$tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row text-center">
            <div>
                {{ $tags ->links() }}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well">
        <h2> New Tag</h2>
        <form method="POST" action="{{ route('tags.store') }}">
            @csrf
            <div class="form-group">
                <label name="name" >Name: </label>
                <input id="name" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <input type="submit" value="Create New Tag"> 
        </form>
        </div>
    </div>
</div>

@endsection