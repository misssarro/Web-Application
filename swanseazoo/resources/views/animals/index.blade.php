
@extends('layout zoo.app')

@section('title','Animals')

@section('content')
    <p>The animals of swansea zoo:</p>
    <ul>
        @foreach ($animals as $animal)
            <li><a href="{{ route('animals.show',['id' => $animal->id])}}">
                {{$animal->name}}</a>
            </li>
        @endforeach
       
    </ul>
    {{ $animals->links() }}
    <a href="{{ route('animals.create' )}}">Create Animal</a>

@endsection
