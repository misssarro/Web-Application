@extends('layouts.app')
@section('title','Create Animal')

@section('content')
    <form method="POST" action="{{ route('animals.store') }}">
        @csrf
        <p>Name: <input type="text" name="name" value="{{ old('name') }}"></p>
        <p>Hp:  <input type="text" name="HP" value="{{ old('HP') }}"></P>
        <p>Type: <input type="text" name="type" value="{{ old('type') }}"></p>
        <p>Enclosure Id 
        <select  name= "enclosure_id">
            @foreach ($enclosures as $enclosure)
                <option value="{{ $enclosure->id }}"
                    @if ($enclosure -> id == old('enclosure_id'))
                        selected="selected"
                    @endif
                    >{{ $enclosure->name }}
                </option>
            @endforeach
        </select>
        </p>
        <input type="submit" value="Submit">
        <a href="{{ route('animals.index') }}"> Cancel</a>
    </form>
    @endsection