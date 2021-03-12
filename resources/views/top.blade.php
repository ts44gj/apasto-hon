<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Apasto</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
     <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{csrf_token()}}">
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style>
        body {
            background: url("{{ asset('image/uFNtMmXqM0fnvFa1615388907_1615388936.jpg') }}");
            background-size: cover;
        }

        .header {
            background-color: #fff;
        }

        .links>a {
            color: #020100;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            background-color: #fff;
        }


        .top-right {
            position: absolute;
            right: 10px;
        }

        .top-left {
            position: absolute;
            left: 10px;
        }


        .content {
            position: absolute;
            left: 750px;
            top: 300px;
            text-align: left;

        }

        .content2 {
            position: absolute;
            right: 200px;
            top: 300px;
            text-align: right;
            vertical-align: text-bottom;
        }

        .title {
            font-size: 150px;
        }

        .navbar {
            background-color: white;
        }

    </style>

</head>
<body>

    <nav class="navbar">
        @if (Route::has('user.login'))
            <div class="navbar-brand top-right ">
                @auth
                    <a class="nav-item" href="{{ url('user/home') }}">User_Home</a>
                @else
                    <a href="{{ route('user.login') }}">User_Login</a>

                    @if (Route::has('user.register'))
                        <a href="{{ route('user.register') }}">User_Register</a>
                    @endif
                @endauth
            </div>
        @endif

        @if (Route::has('admin.login'))
            <div class="navbar-brand  ">
                @auth
                    <a href="{{ url('admin/home') }}">Store_Home</a>
                @else
                    <a href="{{ route('admin.login') }}">Store_Login</a>


                @endauth
            </div>
        @endif
    </nav>
    <div class="container">
        <div class="content">
            <form method="POST" action="{{ route('admin.register') }}">
                <div class="col-md-10 col-form-label text-md-right">
                <label>{{ __('Store_Register') }}</label>
                </div>
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email"
                        class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-8">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-8">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        <div id="app">
    <example-component></example-component>
</div>
<script src="{{ mix('/js/app.js')  }}"></script>
    <!--<div class="content2">
        <div class="container">
            <div class="card-header">{{ __('User_Register') }}</div>
            <form method="POST" action="{{ route('user.register') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email"
                        class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
</body>


</html>
