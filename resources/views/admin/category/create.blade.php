@extends('admin.layout')
@section('content')
    <h2>Create Category</h2>
    <form class="form-group" action="{{route('admin.category.store')}}" method="POST"
          enctype="multipart/form-data">
        @csrf
        <div class="col-12 float-left">
            <label>Name: </label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control">
        </div>
        <div class="col-12 mt-3 float-left">
            <label>Description: </label>
            <textarea class="form-control" name="description">{{old('description')}}</textarea>
        </div>
        <input type="submit" value="Create Category" class="btn btn-primary mt-4 float-right">
    </form>
@endsection
