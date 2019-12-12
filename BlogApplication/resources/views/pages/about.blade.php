@extends('layouts.app')
@section('title','About me')
@section('content')

            <div class="content">
                <div class="title m-b-md">
                    <h1> About {{ $fullName }} </h1>

                    <p>This is a simple blog application created using Laravel !!</p>
                    <P>You can contacnt me by email {{ $email }}</p>
                </div>
            </div>
@endsection
