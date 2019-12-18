@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Profile</div>
                <div class="card-body">
                <form method="POST" action="{{ route('profiles.store') }}">
                    @csrf
                    <div class="form-group">
                        <label name="name" >Name: </label>
                        <input id="name" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <br>
                    <label name="profile_pic">Profile Picture: </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="profile_pic" name="profile_pic" value="{{ old('profile_pic') }}">
                        <label class="custom-file-label" for="profile_pic">Choose file</label>
                    </div>
                    </div>
                    <input  type="submit" value="Create Profile" ></input>
                    <!--<div class="form-group">
                        <label name="profile_pic">Profile Picture: </label>
                        <input id="profile_pic" type= "file "name="profile_pic" rows="10" class="fform-control-file" value="{{ old('profile_pic') }}"></textarea>
                    </div>-->
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection