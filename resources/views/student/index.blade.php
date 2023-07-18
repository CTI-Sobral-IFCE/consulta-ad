@extends('layouts.app')

@section('content')
    <div class="px-4">
        <h1 class="text-4xl text-center border-b border-b-gray-200">Consulta de e-mail Institucional e nº de Matrícula</h1>
        <h3 class="mt-4 text-center text-2xl border-b border-b-gray-200">Exclusivo para Alunos do Campus de Sobral</h3>
        <p class="mt-4 text-center text-lg border-b border-b-gray-200">Informe abaixo o número do seu CPF e sua data de nascimento para descobrir qual é o seu e-mail institucional e matrícula:</p>
    </div>
    <section class="md:flex md:flex-col md:justify-center md:items-center">
        <form action="{{ route('student.search') }}" method="post" class="md:w-1/3" data-grecaptcha-action="message">
            @csrf
            <div class="flex flex-col gap-2 px-4">
                <div class="flex flex-col gap-2 mt-4">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" class="w-full rounded-md h-14" required placeholder="Digite seu CPF">
                    @error('cpf')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 mt-4">
                    <label for="data_nascimento" >Data de Nascimento</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento') }}" class="w-full rounded-md h-14" required>
                    @error('data_nascimento')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-center mt-4 gap-10">
                    <button type="submit" class="flex gap-2 justify-between items-center bg-green text-white px-3 py-2 rounded-md hover:bg-green-light hover:border-green transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        Consultar
                    </button>
                    <a href="https://sistemas.sobral.ifce.edu.br/" class="flex gap-2 justify-between items-center bg-gray-600 text-white px-3 py-2 rounded-md hover:bg-gray-500 hover:border-gray-500 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-5 w-5" viewBox="0 0 16 16">
                            <path d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                        </svg>
                        Voltar
                    </a>
                </div>
            </div>
        </form>
    </section>
@endsection

@push('scripts')
    {{-- <script defer>
        let grecaptchaKeyMeta = document.querySelector("meta[name='grecaptcha-key']");
        let grecaptchaKey = grecaptchaKeyMeta.getAttribute("content");

        grecaptcha.ready(function() {
            let forms = document.querySelectorAll('form[data-grecaptcha-action]');

            Array.from(forms).forEach(function (form) {
                form.onsubmit = (e) => {
                    e.preventDefault();

                    let grecaptchaAction = form.getAttribute('data-grecaptcha-action');

                    grecaptcha.execute(grecaptchaKey, {action: grecaptchaAction})
                        .then((token) => {
                            input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'grecaptcha';
                            input.value = token;

                            form.append(input);

                            form.submit();
                        });
                }
            });
        });
    </script> --}}
    <script defer>
        let cpf = IMask(document.getElementById('cpf'), {
            mask: '000.000.000-00'
        });
    </script>
@endpush
