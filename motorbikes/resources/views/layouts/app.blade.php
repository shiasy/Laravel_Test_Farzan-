<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/me/bootstrap.min.css') }}">
        <link href="{{ asset('css/me/tagsinput.css')}}" rel="stylesheet" type="text/css">


        <link rel="stylesheet" type="text/css" href="{{ asset('css/me/project.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/me/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/me/stylep.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/me/stylepanel.css')}}">

        <script src="{{ asset('js/me/jquery.min.js')}}" data-reload="1"></script>
        <script src="{{ asset('js/me/popper.min.js')}}"></script>
        <script src="{{ asset('js/me/bootstrap.min.js')}}"></script>

        <script src="{{ asset('js/me/datepicker/persian-date.js')}}"></script>
        <script src="{{ asset('js/me/datepicker/persian-datepicker.js')}}"></script>

        <script type="text/javascript" src="{{ asset('js/me/scroll.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/me/javascript.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/me/stylepanel.js')}}"></script>

        <script type="text/javascript" src="{{ asset('js/me/jquery.inview.js')}}"></script>




        <link href="{{ asset('js/me/datepicker/persian-datepicker.css')}}" rel="stylesheet" type="text/css" media="all" />


        <link rel="stylesheet" type="text/css" href="{{ asset('js/me/datetime/disc/jquery-clockpicker.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('js/me/datetime/disc/assets/css/github.min.css')}}">
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
