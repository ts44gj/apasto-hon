@extends('layouts.user.app')

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
                            <a href="{{action('UserPostController@user_create')}}">post</a>
                        </div>
                        <div>
                              <a href="{{action('LinkController@showTimeline')}}">timeline</a>
                        </div>
                     <div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
