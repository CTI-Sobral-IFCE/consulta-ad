<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>


    </head>
    <body class="antialiased flex flex-col gap-2 justify-between min-h-screen">
        <div class="max-w-screen h-16 md:h-16 text-white bg-green flex justify-between items-center p-2">
            <img src="{{ asset('img/logo_branco.svg') }}" alt="" class="h-12">
            <div class="relative inline-block text-left" x-data="{ show: false }">
                <button x-on:click="show = !show" x-on:click.outside="show = false" class="md:hidden rounded-full focus:bg-green-light p-2 transition shadow-md" id="menu-button" aria-expanded="true" aria-haspopup="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-5 w-5" viewBox="0 0 16 16">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    </svg>
                </button>
                <div
                    x-cloak
                    x-show="show"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="origin-top-right absolute right-0 mt-1 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                    role="menu"
                    aria-orientation="vertical"
                    aria-labelledby="menu-button"
                    tabindex="-1"
                >
                    <div class="py-1" role="none">
                      <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                      <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Account settings</a>
                      <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">Support</a>
                      <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-2">License</a>
                      <form method="POST" action="#" role="none">
                        <button type="submit" class="text-gray-700 block w-full text-left px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Sign out</button>
                      </form>
                    </div>
                  </div>
            </div>
        </div>

        <div class="flex-grow">
            <div class="px-4">
                <h1 class="text-4xl text-center border-b border-b-gray-200">Consulta de e-mail Institucional e nº de Matrícula</h1>
                <h3 class="mt-4 text-center text-2xl border-b border-b-gray-200">Exclusivo para Alunos do Campus de Sobral</h3>
                <p class="mt-4 text-center text-lg border-b border-b-gray-200">Informe abaixo o número do seu CPF e sua data de nascimento para descobrir qual é o seu e-mail institucional e matrícula:</p>
            </div>
            <form action="">
                <div class="flex flex-col gap-2 px-4">
                    <div class="flex flex-col gap-2 mt-4">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" class="w-full rounded-md h-14" placeholder="Digite seu CPF">
                    </div>
                    <div class="flex flex-col gap-2 mt-4">
                        <label for="data_nascimento" >Data de Nascimento</label>
                        <input type="date" id="data_nascimento" class="w-full rounded-md h-14">
                    </div>
                    <div class="flex justify-center mt-4">
                        <button type="submit" class="bg-green text-white text-center py-2 px-4 rounded-md">Consultar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="bg-green text-white text-sm p-2">
            <p>Instituto Federal de Educação, Ciência e Tecnologia do Ceará</p>
            <p class="text-xs"><em>Campus</em> Sobral</p>
            <p class="text-xs">Coordenadoria de Tecnologia da Informação</p>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script defer>
            let cpf = IMask(document.getElementById('cpf'), {
                mask: '000.000.000-00'
            })
        </script>
    </body>
</html>
