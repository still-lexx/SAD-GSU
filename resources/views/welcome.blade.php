<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SAD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{url('/css/app.css')}}" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
                <div class="justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0 text-center p-5">
                    <div class="m-5">
                    <img src="{{url('/img/GSU.png')}}" width="200px" height="auto" >
                        <br> <br>
                    <h1 class="h1">Student Case System</h1>
                        <h3 class="h3">Gombe State University</h3>
                    @if (Route::has('login'))
                        <div class="hidden text-center px-6 py-4 pt-8 sm:block">
                            @auth
                                <a href="{{ url('/home') }}" class="text-sm text-gray-700 btn btn-success">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 btn btn-success">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 btn btn-secondary">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                    </div>
            </div>
    </body>
</html>
