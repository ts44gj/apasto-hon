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
               <a href="{{ route('show',$post->admin_id)}}"><img class="img-responsive" src="{{ asset($post -> image) }}"></a>
            </div>
            <div class="row justify-content-center">
            <a href="{{ route('show',$post->admin_id) }}">{{ $post ->name }}</p></a>
            </div>
            <div class="row justify-content-center">
             @if($post->is_like)
                            <form action="{{ route('likes.destroy', $post->like_id) }}" method="POST">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="post_id" value="{{ $post->id }}" required>
                                <button type="submit" style="display: contents;">
                                    <img src="{{ asset('public/image/love-and-romance.svg') }}">
                                </button>
                            </form>
                        @else
                            <form action="{{ route('likes.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}" required>
                                <button type="submit" style="display: contents;">
                                    <img src="https://image.flaticon.com/icons/svg/25/25424.svg"width="10%"/>
                                </button>
                            </form>
                        @endif
             </div>
                        <like-component
                            :post="{{ json_encode($post)}}"
                        ></like-component>
             <div class="row justify-content-center">
              <p class="">{{ $post -> text }}</p>
            </div>

      @endforeach


    </div>


