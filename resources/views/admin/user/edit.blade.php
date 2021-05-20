@extends('admin.layout')
@section('content')
        <h2>Edit User: {{$user->name}}</h2>
        <form class="form-group" action="{{route('admin.user.update', $user->id)}}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="col-6 float-left">
                <label>Name: </label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
            </div>
            <div class="col-6 float-left">
                <label>Email: </label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control">
            </div>
            <div class="col-12 mt-4 float-left">
                <label>Avatar: </label>
                <input type="file" name="image" class="mb-4 form-control-file">
                <img src="123" alt="" class="form-control"/>
            </div>
            <input type="submit" value="Edit User" class="btn btn-primary mt-4 float-right">
        </form>
@endsection
