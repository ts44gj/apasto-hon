@include('layouts.user.app')

@section('content')
    <a href="{{ url('user/home') }}">
        <button class="btn btn-danger"  type="submit">home</button>
    </a>

    <div class="row justify-content-center">
        <p>お店の投稿</p>
    </div>

 <div class="">
      @foreach ( $posts as $post )
            <div class="row justify-content-center">
               <a href="{{ route('show',$post->admin_id) }}"><img src="{{ asset($post -> image) }}"></a>
            </div>
            <div class="row justify-content-center">
            <a href="{{ route('show',$post->admin_id) }}">{{ $post ->name }}</p></a>
            </div>
      @endforeach
</div>



