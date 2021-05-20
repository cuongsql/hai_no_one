@extends('admin.layout')
@section('content')

<div class="container">
    <h2>Laravel DataTables Tutorial Example</h2>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key=>$user)
        <tr>
            <th scope="row">{{++$key}}</th>
            <td><a href="{{route('showUser',$user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td></td>
        </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
@endsection
