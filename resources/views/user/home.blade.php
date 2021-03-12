@extends('layouts.user.app')

@section('content')
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($posts as $post)
                    <div class="card-group">
                        <div class="mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="card-title">
                                            <div class="row justify-content-center">
                                                <h5>
                                                    <a href="{{ route('show', $post->admin_id) }}">{{ $post->name }}</a>
                                                </h5>
                                            </div>
                                        </div>

                                        <div class="card-img-top">
                                            <div class="row justify-content-center">
                                                <a href="{{ route('show', $post->admin_id) }}">
                                                    <img class="image-resize " width="600px" height="auto"
                                                        src="{{ asset($post->image) }}"></a>
                                            </div>
                                        </div>
                                        <div class="card-title">
                                            <div class="row justify-content-center">
                                                <h6>{{ $post->text }}</h6>
                                            </div>
                                            <div class="row justify-content-right">
                                                <h6>{{ $post->created_at }}</h6>
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
@endsection
