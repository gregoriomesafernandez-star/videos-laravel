<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        
        <!-- Scripts -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    
    <body class="bg-body-pattern min-h-screen">


            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="flex-1">
                <div class="max-w-[1600px] mx-auto mt-[80px] p-6">
                    {{ $slot }}
                </div>
                
            </main>


        
    </body>

    <footer class="bg-gray-900 text-gray-300 text-center py-6">
        
        <!-- INICIO TARJETAS -->
        <div id="cards" class="w-full max-w-3xl mx-auto flex justify-center gap-4 px-4">

            <div class="card group">

                <span class="card-icon">
                    M
                </span>

                <h2 class="card-category">
                    Vídeos
                </h2>

                <p class="card-description">
                    Vídeos HD, coméntalos o compártelos con tus amigos.
                </p>

            </div>

            <div class="card group">

                <span class="card-icon">
                    ]
                </span>

                <h2 class="card-category">
                    Música
                </h2>

                <p class="card-description">
                    La mejor música de calidad actualizada.
                </p>

            </div>

        </div>
        <p class="text-sm mt-2">© Proyecto Laravel Videos</p>
    </footer>
</html>
