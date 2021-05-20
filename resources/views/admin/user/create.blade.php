@extends('admin.layout')
@section('content')
        <h2>Create User</h2>
        <form class="form-group" action="{{route('admin.user.store')}}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="col-6 float-left">
                <label>Name: </label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control">
            </div>
            <div class="col-6 float-left">
                <label>Email: </label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control">
            </div>
            <div class="col-6 float-left">
                <label>Password: </label>
                <input type="password" name="password" value="{{old('password')}}" class="form-control">
            </div>
            <div class="col-6 float-left">
                <label>Password confirm: </label>
                <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control">
            </div>
            <div class="col-12 mt-4 float-left">
                <label>Avatar: </label>
                <input type="file" name="image" class="mb-4 form-control-file">
            </div>
            <input type="submit" value="Create User" class="btn btn-primary mt-4 float-right">
        </form>
@endsection
