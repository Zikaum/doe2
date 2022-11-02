<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <title>Doe</title>
    @livewireStyles
</head>
<body style="margin: 0px;">
    @livewire('header', ['headerSelected' => 3])
      <div class="main">
          <div style="display: flex; justify-content: center; align-items: center;">
            <form action="/login" method="POST">
                @csrf
                <h1>LOGIN</h1>
                <p>
                    <label for="email">Email: </label>
                    <input type="text" name="email" required>
                </p>
                <p>
                    <label for="pass">Senha: </label>
                    <input type="password" name="password" required>
                </p>
                <button>
                    <img src="{{asset('images/ProfileIcon.png')}}" width="25" alt="ProfileIcon">
                    <p>ENTRAR</p>
                </button>
            </form>
            <img src="{{asset('images/Doe.png')}}" width="150" alt="Doe">
        </div>
      </div>

    @livewire('footer')
    @livewireScripts
</body>
</html>