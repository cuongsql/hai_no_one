@extends('admin.layout')
@section('content')

    <div class="container">
        <p class="dropdown-item">Name: {{' '.$user->name}}</p>
        <p class="dropdown-item">Email:{{' '.$user->email}}</p>
        <a class="dropdown-item">Create At:{{' '.$user->created_at}}</a>
        <div class="dropdown-divider"></div>
        <p class="dropdown-item">Permission</p>

        <form method="post" action="{{route('admin.user.role',$user->id)}}">
            @csrf
            @foreach($roles as $key=> $role)
                <p class="dropdown-item">
                    <input type="checkbox" name="{{$role->role}}" value="{{$role->id}}"
                                                @foreach($user->roles as $roleUser)
                                                @if($role->id==$roleUser->id)
                                                    checked
                                                @endif
                                                @endforeach>
                    {{$role->role}}<br></p>
            @endforeach
            <p class="dropdown-item">
                <button class="btn btn-primary" type="submit">Save</button>
                <a style="margin-left: 10px" class="btn btn-danger" href="{{route('admin.user.index')}}">Exit</a>
            </p>
        </form>
    </div>


@endsection
