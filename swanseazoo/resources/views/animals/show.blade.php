@extends('layouts.app')

@section('title',' Animal Details')

@section('content')
<ul>
    <li>Name: {{ $animal->name}}</li>
    <li>Hp: {{ $animal->HP ?? 'Unknown'}}</li>
    <li>Typer: {{ $animal->type}}</li>
    <li>Enclosure: {{ $animal->enclosure->name }}</li>
</ul>
@endsection