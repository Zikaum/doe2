<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
    <title>Doe</title>
    @livewireStyles
</head>
<body style="margin: 0px;">

    @livewire('header', ['headerSelected' => 2])

    <div class="main">
        <div style="display: flex; justify-content: center; align-items: center;">
            <form action="/register" method="post">
                @csrf
                <h1>CADASTRO:</h1>
                <div style="display: flex;flex-direction: column;justify-content: center;">
                    <p>
                        <label for="name">Nome: </label>
                        <input name="name" class="long_input" type="text">
                    </p>
                    <p>
                        <label for="age">Idade: </label>
                        <input name="age" type="number" class="short_input" type="text">
                    </p>
                    <div>
                        <p>
                            <label for="city">Cidade: </label>
                            <input name="city" type="text">
                        </p>
                        <p>
                            <label for="state">Estado: </label>
                            <input name="state" type="text">
                        </p>
                        <p style="margin-right: 0px; width: 100%;">
                            <label for="cep">Cep: </label>
                            <input name="cep" type="number">
                        </p>
                    </div>
                    <p>
                        <label for="email">Email: </label>
                        <input name="email" class="long_input" type="text">
                    </p>
                    <p>
                        <label for="password">Senha: </label>
                        <input name="pass" class="long_input" type="text">
                    </p>
                    <p>
                        <label for="blood_type">Tipo Sanguíneo: </label>
                        <input name="bloodType" class="short_input" type="text">
                    </p>
                </div>
                <button>CADASTRAR</button>
            </form>
            <img src="{{asset('images/RegisterImage.png')}}" alt="RegisterImage">
        </div>
    </div>

    @livewire('footer')
    @livewireScripts
</body>
</html>