<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                /*color: #636b6f;*/
                /*padding: 0 25px;*/
                /*font-size: 13px;*/
                /*font-weight: 600;*/
                /*letter-spacing: .1rem;*/
                /*text-decoration: none;*/
                /*text-transform: uppercase;*/
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .btn {
                display: inline-block;
                font-weight: 400;
                color: #212529;
                text-align: center;
                vertical-align: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                background-color: transparent;
                border: 1px solid transparent;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                line-height: 1.5;
                border-radius: 0.25rem;
                transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }
            button:not(:disabled), [type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled) {
                cursor: pointer;
            }
            .btn-primary {
                color: #fff;
                background-color: #007bff;
                border-color: #007bff;
            }
            .btn-success {
                color: #fff;
                background-color: #28a745;
                border-color: #28a745;
            }
            .links .btn-primary,.links .btn-success{
                color: #fff;
                text-transform: none;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            {{--@if (Route::has('login'))--}}
                {{--<div class="top-right links">--}}
                    {{--@auth--}}
                        {{--<a href="{{ url('/home') }}">Home</a>--}}
                    {{--@else--}}
                        {{--<a href="{{ route('login') }}">Login</a>--}}

                        {{--@if (Route::has('register'))--}}
                            {{--<a href="{{ route('register') }}">Register</a>--}}
                        {{--@endif--}}
                    {{--@endauth--}}
                {{--</div>--}}
            {{--@endif--}}

            <div class="content">
                <div class="title m-b-md">
                    Dashboard
                </div>


                        @if (Route::has('login'))
                            <div class="links">
                            @auth
                                    <a style="margin: 0 0 20px 0" class="btn btn-primary" href="{{ route('admin.start') }}">
                                        Dashboard
                                    </a>
                            @else
                                        <a style="margin: 0 0 20px 0" class="btn btn-success" href="{{ route('admin.start') }}">
                                            Go to Dashboard
                                        </a>
                                        <a style="margin: 0 0 20px 0" class="btn btn-primary" href="{{ route('login') }}">
                                            Login
                                        </a>
                                @if (Route::has('register'))
                                    <a style="margin: 0 0 20px 0" class="btn btn-primary" href="{{ route('register') }}">
                                        Register
                                    </a>
                                @endif
                                @endauth

                        @endif
                    {{--<a href="https://laravel.com/docs">Docs</a>--}}
                    {{--<a href="https://laracasts.com">Laracasts</a>--}}
                    {{--<a href="https://laravel-news.com">News</a>--}}
                    {{--<a href="https://blog.laravel.com">Blog</a>--}}
                    {{--<a href="https://nova.laravel.com">Nova</a>--}}
                    {{--<a href="https://forge.laravel.com">Forge</a>--}}
                    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
                    </div>
            </div>
        </div>
    </body>
</html>
