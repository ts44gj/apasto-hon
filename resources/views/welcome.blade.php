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

        <!-- Styles -->
        <style>
            .jumbotron {
                background:url("{{asset('image/799437.jpg')}}") center no-repeat;
                background-size: cover;
            }
            html, body {
                background:url("{{asset('image/799437.jpg')}}") center no-repeat;
                background-size: cover;
                background-color: #fff;
                color:rgb(255, 255, 0);
                font-family: 'Nunito', sans-serif;
                font-weight: 300;
                height: 100vh;
                margin: 0;
                text-shadow  :5px  5px 5px #003366;

            }

            .full-height {
                height: 100vh;

            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }


            .content {
                text-align: center;
            }

            .title {
                font-size: 150px;
            }

            .links > a {
                color: #020100;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                background-color: #fff
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height" >
            @if (Route::has('user.login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('user/home') }}">User_Home</a>
                    @else
                        <a href="{{ route('user.login') }}">User_Login</a>

                        @if (Route::has('user.register'))
                            <a href="{{ route('user.register') }}">User_Register</a>
                        @endif
                    @endauth
                </div>
            @endif

             @if (Route::has('admin.login'))
                <div class="top-left links">
                    @auth
                        <a href="{{ url('admin/home') }}">Store_Home</a>
                    @else
                        <a href="{{ route('admin.login') }}">Store_Login</a>

                        @if (Route::has('admin.register'))
                            <a href="{{ route('admin.register') }}">Store_Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    apasto
                </div>
                
            </div>
        </div>
    </body>
</html>
