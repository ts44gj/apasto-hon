@include('layouts.user.app')

@section('content')
    <a href="{{ action('LinkController@showTimeline') }}">
        <button class="btn btn-danger" type="submit">all_timeline</button>
    </a>

    <div class="row justify-content-center">
        <h4>{{ $user_name }}</h4>
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
                                                <img class="image-resize " width="600px" height="auto"
                                                    src="{{ asset($post->image) }}"></a>
                                            </div>
                                        </div>
                                        <div class="card-text">
                                            <div class="row justify-content-center">
                                                <h6>{{ $post->text }}</h6>
                                            </div>
                                            <div class="row justify-content-center">
                                                <h6>{{ $post->created_at }}</h6>
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
    </div>
