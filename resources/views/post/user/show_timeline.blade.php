@include('layouts.user.app')

@section('content')
    <a href="{{action('LinkController@showTimeline')}}">
        <button class="btn btn-danger" type="submit">all_timeline</button>
    </a>
    <br>
    <br>
    <a href="{{route('user.home.index')}}">
        <button class="btn btn-danger" type="submit">home</button>
    </a>

    <div class="row justify-content-center">
    <p>{{$user_name}}</p>
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
      @endforeach
</div>

