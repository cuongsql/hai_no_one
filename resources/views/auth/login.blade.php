@extends('index')
@section('title', 'Login')
@section('content')

    <body data-app="welcome" class="body-welcome">
    <div class="bar_loading"></div>
    <input type="hidden" class="hidden csrf-token" value="1581995794:9bc8d5789d9a97e335bc3a1700b281325cb59f12">

    <main class="container container-welcome container-welcome-main" id="page_content">
        <div class="row">
            <div class="welcome-page-container row">
                <div class="col-sm-6 col-md-8 pp_welcome_feature">
                    <div class="logo">
                        <a href="/"><img src="{{ asset('/media/img/logo.png') }}" width="42px" alt="logo"></a>
                    </div>
                    <h1 class="animated fadeInUpBig">Welcome to Hai No One</h1>
                    <div class="row margin0">
                        <div class="col-md-4 feature_block animated fadeInUpBig">
                            <div class="inner_blck">
                                <b>Like</b>
                                <p>Cũng giống như những bức ảnh mà bạn thấy thú vị, độc đáo và tốt nhất.</p>
                            </div>
                            <div class="inner_svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"
                                     color="#ff1100">
                                    <path
                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="col-md-4 feature_block animated fadeInUpBig">
                            <div class="inner_blck">
                                <b>Follow</b>
                                <p>Trở thành tín đồ của những người nổi tiếng, những người nổi tiếng và nhiều người khác
                                    trong khu vực của bạn.</p>
                            </div>
                            <div class="inner_svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"
                                     color="#4caf50">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <line x1="20" y1="8" x2="20" y2="14"></line>
                                    <line x1="23" y1="11" x2="17" y2="11"></line>
                                </svg>
                            </div>
                        </div>
                        <div class="col-md-4 feature_block animated fadeInUpBig">
                            <div class="inner_blck">
                                <b>Save</b>
                                <p>Ngay lập tức lưu hình ảnh hoặc video để kiểm tra chúng bất cứ lúc nào.</p>
                            </div>
                            <div class="inner_svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"
                                     color="#ff9800">
                                    <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="pp_wel_footer animated fadeInUpBig">
                        <a class="btn btn-info btn_register" href="{{ route('register') }}">Sign up now!</a>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 pp_welcome_sign">
                    <h3>Sign In</h3>
                    <div class="signin-alert"></div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="pp_mat_input">
                            <input class="form-control" id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="username">Username or E-mail</label>
                            <span class="bar"></span>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <p style="color:red">{{ $message }}</p>
                            </span>
                            @enderror
                        </div>

                        <div class="pp_mat_input">
                            <input class="form-control" id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="current-password">
                            <label for="password">Your Password</label>
                            <span class="bar"></span>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <p style="color:red">{{ $message }}</p>
                            </span>
                            @enderror
                        </div>
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" 

                                {{ old('remember') ? 'checked' : '' }}>
                            <label style="text-align: center;">{{ __('Remember Me') }}</label>
                        </div>
                        <div class="form-group">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <ul class="clearfix social-login nav pull-right">
                                <li class="facebook">
                                    <a href="{{ url('/auth/redirect/facebook') }}">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg" class="feather feather-facebook"
                                            width="24" height="24" viewBox="0 0 24 24" fill="#4267b2">
                                            <path d="M17,2V2H17V6H15C14.31,6 14,6.81 14,7.5V10H14L17,10V14H14V22H10V14H7V10H10V6A4,4 0 0,1 14,2H17Z" />
                                            </svg></a></li>
                                <li>
                                    <a href="{{url('/auth/redirect/google')}}"
                                       style="padding: 0px;height: inherit;width: inherit;line-height: inherit;margin: 0px;">
                                        <img src="{{asset('media/icons/google-plus.svg')}}" alt=""
                                             style="width: 28px;margin-top: -11px;">
                                    </a>
                                </li>
                            </ul>

                        <div class="pp_load_loader">
                            <button class="btn btn-info pp_flat_btn" type="submit"><span>{{ __('Login') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-arrow-right">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg></span></button>
                        </div>

                        <input type="hidden" name="hash" value="1581995794:9bc8d5789d9a97e335bc3a1700b281325cb59f12">
                    </form>
                </div>
            </div>
        </div>


        <link rel="stylesheet" type="text/css"
              href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css"/>
        <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
        <script>
            window.addEventListener("load", function () {
                window.cookieconsent.initialise({
                    "palette": {
                        "popup": {
                            "background": "#3937a3"
                        },
                        "button": {
                            "background": "#e62576"
                        }
                    },
                    "theme": "classic",
                    "position": "bottom-left",
                    "content": {
                        "message": "Trang web này sử dụng cookie để đảm bảo bạn có được trải nghiệm tốt nhất trên trang web của chúng tôi.",
                        "dismiss": "Đã hiểu!",
                    }
                })
            });
        </script>
    </main>

@endsection
