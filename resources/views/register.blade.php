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
                <div class="form-container">
                    <div>
                        <div class="field-container">
                            <label for="name">Nome: </label>
                            <input name="name" class="long_input" type="text" required>
                        </div>
                        <p class="error">{{ $errors->first('name') }}</p>
                    </div>
                    <div>
                        <div class="field-container">
                            <label for="email">Email: </label>
                            <input name="email" class="long_input" type="text" required>
                        </div>
                        <p class="error">{{ $errors->first('email') }}</p>
                    </div>
                    <div>
                        <div class="field-container">
                            <label for="password">Senha: </label>
                            <input name="password" class="long_input" type="password" required>
                        </div>
                        <p class="error">{{ $errors->first('password') }}</p>
                    </div>
                    <div>
                        <div class="field-container">
                            <label for="blood_type">Tipo Sanguíneo: </label>
                            <select name="bloodtype" required>
                                <option>Tipo</option>
                                <option value="A-">A-</option>
                                <option value="A+">A+</option>
                                <option value="B-">B-</option>
                                <option value="B+">B+</option>
                                <option value="AB-">AB-</option>
                                <option value="AB+">AB+</option>
                                <option value="O-">O-</option>
                                <option value="O+">O+</option>
                            </select>
                        </div>
                        <p class="error">{{ $errors->first('bloodtype') }}</p>
                    </div>
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