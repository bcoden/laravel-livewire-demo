<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @livewireStyles
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased font-sans">
    <main class="container mx-auto">
        <livewire:playground />
    </main>
    @livewireScripts
    </body>
</html>
