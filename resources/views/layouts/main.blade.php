<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', "Bon d'achat") }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Share+Tech&display=swap" rel="stylesheet">
                
        {{-- don't forget to build for production --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- @livewireStyles --}}
        {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    </head>

    <body class="overflow-x-hidden text-custom-dark flex flex-col min-h-screen p-0 antialiased relative lg:flex">

        <div class="container mx-auto p-4">
            <div class="flex flex-col lg:flex-row">
                
                @include('includes.form')

                @include('includes.gift_card')
                
            </div>
        </div>

        {{-- <script src="{{ asset('assets/js/script.js') }}"></script> --}}
    </body>

</html>
    