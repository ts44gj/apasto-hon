@include('layouts.admin.app')

@section('content')
    <a>
        <button class="btn btn-danger" type="submit">home</button>
    </a>

    <div class="row justify-content-center">
        <p>自分の投稿</p>
    </div>

 <div class="">
      @foreach ( $posts as $post )
            <div class="row justify-content-center">
                <img src="{{ asset($post -> image) }}">
            </div>
            <div class="row justify-content-center">
              <a href="{{route('show',$post->user->id) }}"><p class="">{{ $post -> name }}</p></a>
            </div>
            <div class="row justify-content-center">
                <p class="">{{ $post -> created_at }}</p>
            </div>
      @endforeach
</div>

