@extends('index')

@section('title', 'Create Post')

@section('content')
@include('core.navbar')
<br/>
<div class="col-12">
    <div class="content post-editing-form">
        <div class="user-heading">
            <img src="{{ asset('storage/'.\Illuminate\Support\Facades\Auth::user()->avatar) }}" class="img-circle">
            <span>{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
            <span class="pull-right">
                @foreach($categories as $category)
                <input type="checkbox" name="{{$category->name}}" value="{{$category->id}}">{{$category->name}}<br>
                @endforeach
            </span>            
            <div id="pp_loader">
            <span style="float:left;margin-right:60px;margin-top:-10px;">0%</span>
            <div class="speeding_wheel"></div></div>
        </div>
        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
                <textarea class="form-control" name="title" rows="4" id="caption" placeholder="Add post caption, #hashtag.. @mention?">{{ $post->title }}</textarea>
              </div>
              <div class="images-renderer" onClick="triggerClick()">
                  <div class="select-images">
                    <img src="{{ asset('storage/').'/'.$post->content }}" id="Display" style="width:800px;height:200px">
                  </div>
              </div>
              <input class="form-control" type="file" name="image" onChange="displayImage(this)" id="idImage">
              <div class="form-group publish">
                  <button type="submit" class="btn btn-info">Save</button>
                  <button type="reset" class="btn btn-default" id="close-anim-modal">Close</button>
              </div>
            </form>
    </div>
    <script type="text/javascript">
        function triggerClick(e) {
            document.querySelector('#idImage').click();
        }
        $('#idImage').hide();
        $('#Display').show();
        
        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('#Display').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
                $('#Display').show();

            }
        }
        </script>
</main>

@endsection
