@extends('index')

@section('title', "Profile: $user->name")

@section('content')
    <main class=" container-profile container-profile-main" id="page_content">
        <style>
            .user-profile-page-content .user-heading::before {
                background-image: url({{asset('storage/'.$user->avatar)}});
            }
        </style>
        <div class="user-profile-page-content">

            {{-- avatar user --}}
            <div class="user-heading">
                <div class="container container-profile user-info">
                    <div class="avatar animated bounceIn">
                        <img src="{{asset('storage/'.$user->avatar)}}">
                    </div>
                    <div class="info">
                        <div class="uname animated fadeInUpBig">
                            <a href="">
                                <h4>{{$user->name}}</h4>
                            </a>
                            <div class="modal-menu dropdown">
                            <span class="dropdown-toggle" data-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-more-horizontal">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="19" cy="12" r="1"></circle>
                                    <circle cx="5" cy="12" r="1"></circle>
                                </svg>
                            </span>
                                <ul class="dropdown-menu zoom">
                                    <li>
                                        <a href="{{route('user.edit_profile', $user->id)}}">Edit info</a>
                                    </li>
                                    <li>
                                        <a href="{{route('user.change_password', $user->id)}}">Change password</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <p class="fluid status animated fadeInUpBig"></p>
                        <ul class="navbar-nav nav justify-content-center social-links animated fadeInUpBig">
                        </ul>
                        <a href="https://demo.pixelphotoscript.com/messages/tester1111"
                           class="btn btn-follow btn-message btn_links animated fadeInUpBig">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-message-square">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                            <span>Message</span>
                        </a>

                    </div>
                </div>
            </div>

            {{-- List post user --}}
            <div class="navbar-bottom">
                <div class="container container-profile">
                    <ul class="navbar-nav nav justify-content-center">
                        <li class="nav-item active">
                            <a class="nav__item" href="https://demo.pixelphotoscript.com/tester1111/posts">
                                {{$user->posts->count()}}<span> Posts</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="fluid include col-md-12">
                @foreach($posts as $post)
                    <div class="user-posts__container col-md-4">
                        <div class="user-posts new_prof_user_posts ">
                            <div class="item wrapper lazy_" >
                                <div class="user-postset" style="position: relative;">
                                    <div class="media"
                                         style="background-image: url('{{asset('storage/'.$post->content)}}');">
                                        <div class="caption">
                                        <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                   viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                                   stroke-linecap="round" stroke-linejoin="round"
                                                   class="feather feather-heart"><path
                                                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>{{$post->likes->count()}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-message-circle"><path
                                                    d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>{{$post->comment->count()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            var gwidth = ($('.user-posts').width() / 3);
                            var config = {
                                selector: '.item',
                                gutter: 0,
                                animate: true,
                                animationOptions: {
                                    speed: 100,
                                    duration: 200
                                }
                            }
                            if ($(window).width() > 992) {
                                config.width = 303.34;
                            }
                            ;
                            $(".user-posts").gridalicious(config);
                        </script>
                    </div>
                @endforeach
            </div>
@endsection
