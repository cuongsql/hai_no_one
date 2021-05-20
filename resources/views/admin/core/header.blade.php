<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset('admin_public/img/logo/logo.png')}}" rel="icon">
    <title>Hai_No_One - Dashboard</title>
    <link href="{{asset('admin_public/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin_public/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin_public/css/ruang-admin.min.css')}}" rel="stylesheet">
    {{-- datatables --}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="{{asset('admin_public/vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin_public/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <link href="{{asset('admin_public/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
            <div class="sidebar-brand-icon">
                <img src="{{asset('admin_public/img/logo/logo2.png')}}">
            </div>
            <div class="sidebar-brand-text mx-3">Hai_No_One</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="{{route('admin.index')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Features
        </div>
        {{--        User Manager--}}
        <li class="nav-item  @if(request()->routeIs('admin.user.*')) active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
               aria-expanded="true" aria-controls="collapseUser">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>User Manager</span>
            </a>
            <div id="collapseUser" class="collapse @if(request()->routeIs('admin.user.*')) show @endif "
                 aria-labelledby="headingUser"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">User</h6>
                    <a class="collapse-item @if(request()->routeIs('admin.user.index')) bg-gray-400 active @endif  "
                       href="{{route('admin.user.index')}}">List User</a>
                    @can('create')
                        <a class="collapse-item @if(request()->routeIs('admin.user.create')) bg-gray-400 active @endif "
                           href="{{route('admin.user.create')}}">Create User</a>
                    @endcan
                </div>
            </div>
        </li>
        {{--        Category Manager--}}
        <li class="nav-item @if(request()->routeIs('admin.category.*')) active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
               aria-expanded="true"
               aria-controls="collapseCategory">
                <i class="fas fa-fw fa-table"></i>
                <span>Category Manager</span>
            </a>
            <div id="collapseCategory" class="collapse @if(request()->routeIs('admin.category.*')) show @endif"
                 aria-labelledby="headingCategory"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Category</h6>
                    <a class="collapse-item  @if(request()->routeIs('admin.category.index')) bg-gray-400 active @endif "
                       href="{{route('admin.category.index')}}">List Category</a>
                    <a class="collapse-item @if(request()->routeIs('admin.category.create')) bg-gray-400 active @endif"
                       href="{{route('admin.category.create')}}">Create Category</a>
                </div>
            </div>
        </li>

        {{--        Post Manager--}}
        <li class="nav-item @if(request()->routeIs('admin.post.*')) active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePost"
               aria-expanded="true"
               aria-controls="collapsePost">
                <i class="fas fa-fw fa-table"></i>
                <span>Post Manager</span>
            </a>
            <div id="collapsePost" class="collapse @if(request()->routeIs('admin.post.*')) show @endif"
                 aria-labelledby="headingPost" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Post</h6>
                    <a class="collapse-item @if(request()->routeIs('admin.post.index')) bg-gray-400 active @endif"
                       href="{{route('admin.post.index')}}">List Post</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Examples
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage"
               aria-expanded="true"
               aria-controls="collapsePage">
                <i class="fas fa-fw fa-columns"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Example Pages</h6>
                    <a class="collapse-item" href="login.html">Login</a>
                    <a class="collapse-item" href="register.html">Register</a>
                    <a class="collapse-item" href="404.html">404 Page</a>
                    <a class="collapse-item" href="blank.html">Blank Page</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="version" id="version-ruangadmin_public"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-1 small"
                                           placeholder="What do you want to look for?"
                                           aria-label="Search" aria-describedby="basic-addon2"
                                           style="border-color: #3f51b5;">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <span class="badge badge-danger badge-counter">{{ 0 }}</span>
                        </a>
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                            {{--                                <div class="mr-3">--}}
                            {{--                                    <div class="icon-circle bg-primary">--}}
                            {{--                                        <i class="fas fa-file-alt text-white"></i>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div>--}}
                            {{--                                    <div class="small text-gray-500">December 12, 2019</div>--}}
                            {{--                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>--}}
                            {{--                                </div>--}}
                            {{--                            </a>--}}
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                            <span class="badge badge-warning badge-counter">{{ 0 }}</span>
                        </a>
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                            {{--                                <div class="dropdown-list-image mr-3">--}}
                            {{--                                    <img class="rounded-circle" src="img/man.png" style="max-width: 60px" alt="">--}}
                            {{--                                    <div class="status-indicator bg-success"></div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="font-weight-bold">--}}
                            {{--                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a--}}
                            {{--                                        problem I've been--}}
                            {{--                                        having.--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="small text-gray-500">Udin Cilok · 58m</div>--}}
                            {{--                                </div>--}}
                            {{--                            </a>--}}
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img class="img-profile rounded-circle"
                                 src="{{asset('storage/'.\Illuminate\Support\Facades\Auth::user()->avatar)}}"
                                 style="max-width: 60px">
                            <span
                                class="ml-2 d-none d-lg-inline text-white small">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item"
                               href="{{route('user.profile', \Illuminate\Support\Facades\Auth::user()->id)}}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item"
                               href="{{route('user.change_password', \Illuminate\Support\Facades\Auth::user()->id)}}">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Change Password
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="post" action="{{route('logout')}}" class="">
                                @csrf
                                <button type="submit" class="dropdown-item" href="{{route('logout')}}"><i
                                        class='fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400'></i>Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- Topbar -->


