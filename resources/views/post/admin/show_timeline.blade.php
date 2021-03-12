@include('layouts.admin.app')

@section('content')

    <a href="{{ route('admin_Timeline') }}">
        <button class="btn btn-danger" type="submit">store_home</button>
    </a>

    <div class="row justify-content-center">
        <h2>{{ Auth::user()->name }}</h2>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="card-group">
                        <div class="mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="card-img-top">
                                            <div class="row justify-content-center">
                                               <img class="image-resize" width="600px" height="auto"
                                                        src="{{ asset($post->image) }}">
                                            </div>
                                        </div>
                                        <div class="card-text">
                                            <div class="row justify-content-center">
                                                <h6>{{ $post->text }}</h6>
                                            </div>
                                            <div class="row justify-content-center">
                                                <h6>{{ $post->created_at }}</h6>
                                            </div>

                                            <div class="row justify-content-center">
                                                <form style="display: inline-block;" method="POST"
                                                    action="{{ action('PostController@destroy', $post->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">削除する</button>
                                                </form>
                                                <a href="{{ action('PostController@edit', $post->id) }}">
                                                    <button class="btn btn-primary">編集する</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
