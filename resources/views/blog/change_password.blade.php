@extends('index')

@section('title', "Profile")

@section('content')

    <h1>Profile: {{$user->name}}</h1>

    <form method="POST" action="{{route('user.update_password', $user->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Old password: </label>
            <input type="password" name="old_password" class="form-control">
        </div>
        <div class="form-group">
            <label>New password: </label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>Password confirm: </label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-info btn-lg btn-block">Change Password</button>
    </form>
@endsection
