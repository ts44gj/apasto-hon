@include('layouts.admin.app')

@section('content')

    <a href="{{route('admin.home.index')}}">
        <button class="btn btn-danger" type="submit">store_home</button>
    </a>

    <div class="row justify-content-center">
    <p>{{Auth::user()->name}}</p>
    </div>

 <div class="">

      @foreach ($posts as $post )
            <div class="row justify-content-center">
                <img class="img-responsive" src="{{ asset($post -> image) }}">
            </div>
            <div class="row justify-content-center">
              <p class="">{{ $post -> text }}</p>
            </div>
            <div class="row justify-content-center">
                <p class="">{{ $post -> created_at }}</p>
            </div>
            <div class="row justify-content-center mb-4 text-right">
        <form
        style="display: inline-block;"
        method="POST"
        action="{{ action('PostController@destroy', $post->id) }}"
        >
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">削除する</button>
        </form>
        <a href="{{action('PostController@edit',$post->id)}}">
        <button class="btn btn-primary">編集する</button>
        </a>
</div>
      @endforeach
</div>

