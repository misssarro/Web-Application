@extends('layouts.app')

@section('title',' Animal Details')

@section('content')
<ul>
    <li>Name: {{ $animal->name}}</li>
    <li>Hp: {{ $animal->HP ?? 'Unknown'}}</li>
    <li>Typer: {{ $animal->type}}</li>
    <li>Enclosure: {{ $animal->enclosure->name }}</li>
</ul>
<form method="POST"
    action="{{ route('animals.destroy',['id => $animal->id']) }}">
    @csrf
    @method ('Delete')
    <button type="submit">Delete</button>
</form>

<p><a href="{{ route('animals.index') }}">Back</a></p>
@endsection