@extends('index')

@section('title', "Profile")

@section('content')

    <h1>Profile: {{$user->name}}</h1>

    <form method="POST" action="{{route('user.update_profile', $user->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Username: </label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label>Email Address: </label>
            <input type="email" name="email" class="form-control" value="{{$user->email}}" disabled>
        </div>
        <div class="form-group">
            <label>Avatar</label>
            <br>
            &nbsp;
            <br>
            <img src="{{asset('storage/'.$user->avatar)}}" alt="avatar" style="width: 300px">
            <br>
            &nbsp;
            <input type="file" name="image">
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Edit</button>
    </form>

@endsection
