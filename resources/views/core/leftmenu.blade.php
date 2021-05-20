</div>
</div>
<div class="col-md-4 custom-fixed-element no-padding-left">
    <div class="home-sidebar-right">
        <div class="clear"></div>
        <div id="home-sidebar-sticky">
            <div class="featured-posts">
                <h5>All Post
                    <span class="create-new-post btn btn-link pull-right"><a href="/">view all</a></span>
                </h5>
                <div class="fluid list">
                    @foreach($posts as $post )
                        <div class="item" id="">
                            <a href="{{route('post.content', $post->id)}}" class="fluid" onclick="">
                                <div class="thumb"
                                     style="background-image: url('{{asset('storage/'.$post->content)}}');">
                                </div>
                                <div class="caption">
                                    <div class="uname">
                                        <h6>{{$post->title}}</h6>
                                    </div>
                                    <span>
                                    <time></time>
                                </span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- khu thu 2 --}}
            <div class="stories" onclick="alert('tính năng đang phát triển')">
                <h5>Stories</h5>
                <div class="fluid list">
                    <span class="fluid text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-layers">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                        Here will be stories from people you follow.
                        <span class="create-new-post btn btn-primary" data-type="story">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-plus">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Add story
                        </span>
                    </span>
                </div>
            </div>


        </div>
    </div>
</div>
</div>

</main>
