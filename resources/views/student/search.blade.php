@extends('layouts.app')

@section('content')
    <section class="px-4">
        <h1 class="text-center text-4xl border-b border-b-gray-200">Consulta de e-mail institucional / Matrícula</h1>
        @if ($student->count())
            <h3 class="mt-4 text-2xl text-justify">Olá <strong>{{ $student->first()->description[0] }}</strong>!<br>Encontramos a(s) seguinte(s) matricula(s) e e-mail instituicional referente ao seu cadastro.</h3>
        @endif
    </section>

    <section class="my-4 border-b border-b-gray-200 p-4">
        @forelse ($student as $item)
            <table class="table-auto w-full @if(!$loop->last) mb-4 @endif">
                <tr>
                    <th class="border border-gray-400 px-2 py-2 text-right w-1/5">Matrícula</th>
                    <td class="border border-gray-400 px-2 py-2">{{ $item->cn[0] }}</td>
                </tr>
                <tr>
                    <th class="border border-gray-400 px-2 py-2 text-right">Curso</th>
                    <td class="border border-gray-400 px-2 py-2">{{ App\Helper\FormatData::collectCourse($item->cn[0]) }}</td>
                </tr>
                <tr>
                    <th class="border border-gray-400 px-2 py-2 text-right">E-mail pessoal</th>
                    <td class="border border-gray-400 px-2 py-2">{{ $item->mailNickname[0] }}</td>
                </tr>
                <tr>
                    <th class="border border-gray-400 px-2 py-2 text-right">E-mail Institucional</th>
                    <td class="border border-gray-400 px-2 py-2 @if(isset($item->mail[0])) bg-lime-300 @endif">{{ $item->mail[0]?? '-' }}</td>
                </tr>
            </table>
        @empty
            <h3 class="text-center">Nenhuma matrícula encontrada</h3>
        @endforelse
        <div class="flex justify-center mt-6">
            <a href="{{ route('student.index') }}" class="flex gap-2 justify-between items-center border border-green-dark bg-green text-white px-2 py-1 rounded-md hover:bg-green-light hover:border-green">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-5 w-5" viewBox="0 0 16 16">
                    <path d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                </svg>
                Voltar
            </a>
        </div>
    </section>

    @if ($student->count())
        <section class="p-4">
            <h1>E-mail não cadastrado?</h1>
            <h3>Siga as instruções abaixo para criar o seu e-mail institucional:</h3>
            <p>Caso tenha aparecido a mensagem de que o seu e-mail institucional não está cadastrado, você poderá criá-lo seguindo o passo-a-passo abaixo:</p>
            <ol class="list-decimal ml-4">
                <li>
                    Acesse o site <a href="http://suap.ifce.edu.br/" class="text-blue-500" target="_blank" rel="noopener noreferrer">suap.ifce.edu.br</a>
                    e faça o login com o seu número de matrícula e a senha que será: if.cpf (sem os pontos e traço).
                    <ol class="list-roman ml-6">
                        <li>Exemplo:
                            <ul class="list-disc ml-6">
                                <li><strong>Usuário:</strong> 123456789123 <small>Matrícula do aluno</small></li>
                                <li><strong>Senha:</strong> @IFCE.&#60;DataNascimento&#62; <small>Data de Nascimento do aluno (apenas números)</small></li>
                            </ul>
                        </li>
                    </ol>
                </li>
                <li>
                    Clique em "Escolha seu e-mail acadêmico"
                    <figure class="-ml-2">
                        <img src="https://sistemas.sobral.ifce.edu.br/emailalunos/img/figmail1.1.png" alt="">
                        <figcaption class="text-xs">Figura 1: Escolha seu e-mail acadêmico</figcaption>
                    </figure>
                    <li>Observação: <strong>Não será possível alterar o e-mail após escolhido.</strong></li>
                    <ol class="list-roman ml-6">

                    </ol>
                </li>
                <li>Seu e-mail será criado e estará disponível em no mínimo quatro horas.</li>
                <li>
                    Confira também se o seu e-mail pessoal cadastrado no sistema está correto. Clique no seu nome (no menu lateral esquerdo)
                    e depois clique em "editar > e-mail", no canto superior direito da tela. Caso o campo esteja em branco ou o e-mail esteja incorreto,
                    faça a alteração informando seu e-mail pessoal e, em seguida, clique em salvar.
                    <figure class="-ml-2">
                        <img src="https://sistemas.sobral.ifce.edu.br/emailalunos/img/figmail3.png" alt="">
                        <figcaption class="text-xs">Figura 1: Tela de confirmação e-mail pessoal</figcaption>
                    </figure>
                </li>
                <li>
                    Aguarde no mínimo quatro horas para que o e-mail seja criado na plataforma Google. Depois, para alterar a senha aleatória que foi criada,
                    entre novamente no site suap.ifce.edu.br e clique em "Deseja alterar sua senha?". A senha do suap será a mesma do e-mail acadêmico,
                    do portal de periódicos da Capes, do ambiente BVU e de outros sistemas do IFCE. ;
                    <figure class="-ml-2">
                        <img src="https://sistemas.sobral.ifce.edu.br/emailalunos/img/figmail4.png" alt="">
                        <figcaption class="text-xs">Figura 1: Tela de login do SUAP</figcaption>
                    </figure>
                </li>
                <li>
                    Para acessar o seu e-mail, entre em <a href="https://accounts.google.com/signin/v2/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ltmpl=default&hd=ifce.edu.br&service=mail&sacu=1&rip=1&lp=1&hl=pt&flowName=GlifWebSignIn&flowEntry=ServiceLogin#identifier" class="text-blue-500" target="_blank" rel="noopener noreferrer">gmail.com</a>.
                </li>
            </ol>
        </section>
        <section class="flex flex-col items-center mt-4 border-t border-t-gray-200 text-center">
            <div class="flex justify-center my-6">
                <a href="{{ route('student.index') }}" class="flex gap-2 justify-between items-center border border-green-dark bg-green text-white px-2 py-1 rounded-md hover:bg-green-light hover:border-green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-5 w-5" viewBox="0 0 16 16">
                        <path d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                    </svg>
                    Voltar
                </a>
            </div>
        </section>
    @endif
@endsection
