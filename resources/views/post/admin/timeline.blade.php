@include('layouts.admin.app')

@section('content')
<a href="{{route('admin.home.index')}}">
     <button class="btn btn-danger" type="submit">store_home</button>
</a>

    <div class="row justify-content-center">
    <p>お店の投稿</p>
    </div>

 <div class="">
      @foreach ($posts as $post )
            <div class="row justify-content-center">
                <img src="{{ asset($post -> image) }}">
            </div>
            <div class="row justify-content-center">
              <p class="">{{ $post -> text }}</p>
            </div>
            <div class="row justify-content-center">
                <p class="">{{ $post -> created_at }}</p>
            </div>
      @endforeach
</div>

