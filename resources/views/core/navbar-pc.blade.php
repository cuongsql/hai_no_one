<ul class="nav navbar-nav navbar-right">
    <li>
        <a href="/" class="mode_button">
            <svg fill="#009da0" height="24" viewBox="0 0 24 24" width="24" class="feather feather-bulb">
                <path
                    d="M12,6A6,6 0 0,1 18,12C18,14.22 16.79,16.16 15,17.2V19A1,1 0 0,1 14,20H10A1,1 0 0,1 9,19V17.2C7.21,16.16 6,14.22 6,12A6,6 0 0,1 12,6M14,21V22A1,1 0 0,1 13,23H11A1,1 0 0,1 10,22V21H14M20,11H23V13H20V11M1,11H4V13H1V11M13,1V4H11V1H13M4.92,3.5L7.05,5.64L5.63,7.05L3.5,4.93L4.92,3.5M16.95,5.63L19.07,3.5L20.5,4.93L18.37,7.05L16.95,5.63Z">
                </path>
            </svg>
        </a>
    </li>
    <li class="hide_head_link" id="messages_nav">
        <a href="{{ asset('/') }}" class="_messages">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            </svg>
            <small class="badge" id="new__messages"></small>
        </a>
    </li>
    <li>
        <div class="dropdown notifications-list" id="get-notifications">
            <span class="dropdown-toggle pointer" data-toggle="dropdown">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                    <path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0">
                    </path>
                </svg>
                <small class="badge" id="new__notif"></small>
            </span>
        </div>
    </li>
    @auth
        <li class="hide_head_link" id="avatar_active">
            <div class="dropdown">
                <div id="dLabel" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('storage/'.\Illuminate\Support\Facades\Auth::user()->avatar)}}" width="30px" height="30px" class="img-circle">
                    <span class="caret"></span>
                </div>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li>
                        <a href="{{route('user.profile', \Illuminate\Support\Facades\Auth::user()->id)}}">Profile</a>
                    </li>
                    @can('admin')
                    <li>
                        <a href="{{route('admin.index')}}">Admin Plan</a>
                    </li>
                    @endcan
                    <li>
                        <a href="{{route('user.change_password', \Illuminate\Support\Facades\Auth::user()->id)}}">Change Password</a>
                    </li>
                    <li>
                        <a href="#">
                            <form method="POST" class="" action="{{route('logout')}}">
                            @csrf
                                <input type="submit" class="dropdown-item "
                                       style="border: none;padding: 0; background: none;" value="Logout">
                        </form>
                        </a>
                    <li>
                </ul>
            </div>
            <div class="clear"></div>
        </li>
    @else
        <li class="pp_front_menu last_menu" id="store_nav">
            <a href="{{ route('login') }}">
                <span>Login</span>
            </a>
        </li>
        <li class="pp_front_menu last_menu" id="store_nav">
            <a href="{{ route('register') }}">
                <span>Register</span>
            </a>
        </li>
    @endauth
</ul>
