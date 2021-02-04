@include('layouts.user.app')

@section('content')
    <a href="{{ route('user.home.index') }}">
        <button class="btn btn-danger"  type="submit">home</button>
    </a>

    <div class="row justify-content-center">
        <p>all_timeline</p>
    </div>

 <div class="">
      @foreach ( $posts as $post )
            <div class="row justify-content-center">
               <a href="{{ route('show',$post->admin_id)}}"><img src="{{ asset($post -> image) }}"></a>
            </div>
            <div class="row justify-content-center">
            <a href="{{ route('show',$post->admin_id) }}">{{ $post ->name }}</p></a>
            </div>
      @endforeach
</div>

