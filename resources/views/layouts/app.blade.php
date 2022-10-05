<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="grecaptcha-key" content="{{config('recaptcha.v3.public_key')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}" />
        <meta name='description' content='Sistema do IFCE - Campus Sobral'>
        <meta rel='canonical' href='https://servicos.sobral.ifce.edu.br/alunos/consulta/'>  <meta name='author' content='IFCE Campus de Sobral'>
        <meta name='robots' content='index'>
        <meta name='google' value='notranslate'>
        <meta name='googlebot' value='index'>
        <!-- Open Graph Facebook -->
        <meta property='og:title' content='Sistemas - IFCE - Campus Sobral'>
        <meta property='og:description' content='Sistema do IFCE - Campus Sobral'>
        <meta property='og:url' content='https://servicos.sobral.ifce.edu.br/alunos/consulta/'>
        <meta property='og:site_name' content='IFCE Campus de Sobral'>
        <meta property='og:type' content='website'>
        <meta property='og:image' content='https://sistemas.sobral.ifce.edu.br/img/ifce-jpg-4.jpg'>
        <!-- Twitter -->
        <meta name='twitter:title' content='Sistemas - IFCE - Campus Sobral'>
        <meta name='twitter:description' content='Sistema do IFCE - Campus Sobral'>
        <meta name='twitter:url' content='https://servicos.sobral.ifce.edu.br/alunos/consulta/'>
        <meta name='twitter:card' content='summary'>
        <meta name='twitter:image' content='https://sistemas.sobral.ifce.edu.br/img/ifce-jpg-4.jpg'>
        <meta name='twitter:site' content='@IFCE_'>

        <!-- Title -->
        <title>{{ config('app.name') }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preload" href="{{ asset('css/app.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="{{ asset('css/app.css') }}"></noscript>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased flex flex-col gap-2 justify-between min-h-screen">
        <!-- nabar -->
        @include('layouts.navbar')

        <!-- content -->
        <div class="flex-grow md:px-20">
            @yield('content')
        </div>


        <!-- footer -->
        @include('layouts.footer')

        <!-- scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://www.google.com/recaptcha/api.js?render={{config('recaptcha.v3.public_key')}}"></script>
        @stack('scripts')
    </body>
</html>
