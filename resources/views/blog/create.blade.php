@extends('index')

@section('title', 'Create Post')

@section('content')
    @include('core.navbar')
    <br/>
    <div class="col-12">
        <div class="content post-editing-form">
            <div class="user-heading">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <img src="{{ asset('storage/'.\Illuminate\Support\Facades\Auth::user()->avatar) }}"
                         class="img-circle">
                    <span>{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                    <span class="pull-right">
                @foreach($categories as $category)
                            <input type="checkbox" name="{{$category->id}}"
                                   value="{{$category->id}}">{{$category->name}}<br>
                        @endforeach
            </span>
                    <div id="pp_loader">
                        <span style="float:left;margin-right:60px;margin-top:-10px;">0%</span>
                        <div class="speeding_wheel"></div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="title" rows="4" id="caption"
                                  placeholder="Add post caption, #hashtag.. @mention?"></textarea>
                    </div>
                    <div class="images-renderer" onClick="triggerClick()">
                        <div class="select-images">
                    <span id="hide-img-post">
                          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                               stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3"
                                                                                                                  y="3"
                                                                                                                  width="18"
                                                                                                                  height="18"
                                                                                                                  rx="2"
                                                                                                                  ry="2"></rect><circle
                                  cx="8.5" cy="8.5" r="1.5"></circle><polyline
                                  points="21 15 16 10 5 21"></polyline></svg>
                      <h5>Image</h5>
                    </span>
                            <img id="Display" style="width:800px;height:200px">
                        </div>
                    </div>
                    <input class="form-control" type="file" name="image" onChange="displayImage(this)" id="idImage">
                    <div class="form-group publish">
                        <button type="submit" class="btn btn-info">Save</button>
                        <a href="{{route('home')}}" class="btn btn-default" id="close-anim-modal">Close</a>
                    </div>
                </form>
            </div>
            <script type="text/javascript">
                function triggerClick(e) {
                    document.querySelector('#idImage').click();
                }
                $('#idImage').hide();
                $('#Display').hide();

                function displayImage(e) {
                    if (e.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            document.querySelector('#Display').setAttribute('src', e.target.result);
                        }
                        reader.readAsDataURL(e.files[0]);
                        $('#Display').show();
                        $('#hide-img-post').hide();


                    }
                }
            </script>
            </main>

@endsection
