@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                        <div>
                            <a href="{{action('PostController@create')}}">post</a>
                        </div>
                        <div>
                              <a href="{{action('PostController@show',auth()->user()->id)}}">timeline</a>
                        </div>
                </div>
    </div>
</div>
@foreach($posts as $post)
<a href="{{ route('show',$post->id)}}">aaaaa</a>
@endforeach
@endsection
