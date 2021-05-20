@extends('index')
@section('title', 'Home')
@section('content')
    @include('core.topmenu')

    <div class="home-posts-container">
        @forelse ($posts as $item)
            <div class="timeline-posts content-shadow">
                <div class="header">
                    <a href="{{ route('user.profile', $item->user->id) }}" class="publisher-name">
                        <img src="{{ asset('storage/'.$item->user->avatar) }}" class="img-circle"/>
                        {{ $item->user->name }}
                    </a>
                    <div class="dropdown pull-right">
                <span class="dropdown-toggle" data-toggle="dropdown">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-more-vertical">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="12" cy="5" r="1"></circle>
                        <circle cx="12" cy="19" r="1"></circle>
                    </svg>
                </span>
                        <ul class="dropdown-menu zoom">
                            <li>
                                <a href="{{ route('post.content', $item->id) }}" target="_blank">Xem bài viết</a>
                                @can('update')
                                    <a href="{{ route('post.edit', $item->id) }}">Edit</a>
                                @endcan
                                @can('delete')
                                    <a href="{{ route('post.destroy', $item->id) }}">Delete</a>
                                @endcan
                            </li>
                        </ul>
                    </div>
                    <time><span class="time-ago">{{ $item->updated_at->diffForHumans() }}</span></time>
                    <div class="clear"></div>
                    <h4>{{$item->title}}</h4>
                </div>

                <div class="post-images fluid lightgallery" data-lightgallery="11809">
                    <a href="{{ route('post.content', $item->id) }}" class="image-lightbox">
                        <img src="/storage/{{ $item->content }}" class="img-res">
                    </a>
                </div>
                <div class="actions">
            <span class="like-post" data-id="{{$item->id}}">
                <a href="{{route('post.like',$item->id)}}">
                    <span class="like-icon"></span>
                </a>
            </span>
                    <span onclick="">
                        <a href="{{route('post.content', $item->id)}}">
                        <svg viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-message-circle"><path
                                d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                    </path>
                    </svg>
                        </a>
            </span>
                </div>
                <span class="pull-right">
            <svg version="1.1" id="IconsRepoEditor" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px"
                 viewBox="0 0 134.229 134.229" style="enable-background:new 0 0 134.229 134.229;" xml:space="preserve"
                 fill="#000000" stroke="#000000" stroke-width="0"><g id="IconsRepo_bgCarrier"></g> <path
                    d="M131.249,110.53L119.606,5.8c-0.347-3.185-3.55-5.8-7.13-5.8h-90.72c-3.568,0-6.777,2.615-7.127,5.8L2.987,110.53 c0,0.129-0.067,0.232-0.067,0.359v11.667c0,6.437,5.237,11.673,11.673,11.673h105.044c6.437,0,11.673-5.236,11.673-11.673v-11.667 C131.31,110.762,131.249,110.652,131.249,110.53z M46.579,39.446l12.906,14.272l29.426-24.523l7.989,9.578l-38.624,32.19 l-20.95-23.136L46.579,39.446z M125.471,122.556c0,3.222-2.618,5.84-5.834,5.84H14.599c-3.212,0-5.836-2.618-5.836-5.84v-11.667 c0-3.221,2.625-5.839,5.836-5.839h105.044c3.209,0,5.839,2.618,5.839,5.839v11.667H125.471z"></path> <path
                    d="M21.346,112.528c2.317,0,4.195,1.875,4.195,4.189c0,2.319-1.878,4.201-4.195,4.201c-2.32,0-4.198-1.882-4.198-4.201 C17.147,114.403,19.026,112.528,21.346,112.528z"></path> </svg>
            <strong>
                @foreach($item->categories as $category)
                    {{$category->name.', '}}
                @endforeach</strong>
        </span>
                <div class="post-votes">
                    <div>
                        <span>{{$item->likes()->count()}}</span>
                        <strong>Likes</strong>
                    </div>
                    <div>

                        <span>{{ $item->comment->count() }}</span>
                        Comments

                    </div>
                </div>
                <div class="caption" data-caption>{{ $item->title }}</div>
            </div>
        @empty
            khong co data
        @endforelse
        @include('core.leftmenu')
        <div id="tpopup">
            <a href="https://corona.kompa.ai/d" target="_blank">
                <img href="https://corona.kompa.ai/d"
                     src="https://cms.luatvietnam.vn/uploaded/Images/Original/2020/01/31/Bieu_hien_va_cach_phong_tranh_virut_Corona_3101105553.jpg">
            </a>
        </div>
    </div>
@endsection

