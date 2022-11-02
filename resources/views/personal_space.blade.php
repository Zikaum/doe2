<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/personal_space.css') }}" />
  <title>Doe</title>
  @livewireStyles
</head>
<body style="margin: 0px;">
    @livewire('header', ['headerSelected' => 4])

    <div class="main">
        <h1>Espaço Pessoal</h1>
        <div class="space_titles">
            <a @if ($optionSelected == 0) class="personal_option selected_option"@else class="personal_option" @endif href="/personal_space/my_donations">MINHAS DOAÇÕES</a>
            <a @if ($optionSelected == 1) class="personal_option selected_option"@else class="personal_option" @endif href="/personal_space/my_requests">MEUS PEDIDOS</a>
            <a @if ($optionSelected == 2) class="personal_option selected_option"@else class="personal_option" @endif href="/personal_space/make_request">FAZER PEDIDO</a>
        </div>
        <div class="requests_area">
            @switch($optionSelected)
                @case(1)
                    @if ($myPosts)
                        @foreach ($myPosts as $myPost)
                            <div class="request">
                                <p class="request_text">
                                    Olá, você fez um pedido <br>
                                    Para o dia _/_/__ <br>
                                    Com {{$myPost->amount}} bolsas de sangue <br>
                                    No local {{$myPost->place}} <br>
                                    E ele ainda está ATIVO
                                </p>
                                <div style="display:flex; align-items: flex-end;justify-content:end">
                                    <button class="request_button">EDITAR</button>
                                    <button class="request_button">APAGAR</button>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @break
                @case(2)
                    
                        <div class="make_request_area">
                            <form action="/personal_space/make_request" method="POST">
                                @csrf
                                <div>
                                    <label for="place">Lugar da doação: </label>
                                    <input type="text" name="place">
                                </div>
                                <div>
                                    <label for="place">Motivo da doação: </label>
                                    <input type="text" name="reason">
                                </div>
                                <div>
                                    <label for="place">Quantidade de bolsas de sangue: </label>
                                    <input class="short_input" type="number" name="amount">
                                </div>
                                <button class="request_button">FAZER PEDIDO</button>
                            </form>
                        </div>
                    @break
                @default
                        <p class="donation">
                            Olá, você doou a última vez na data _/_/__<br/>
                            Para _____________________________
                            <br><br><br><br><br><br><br>
                            Você nunca doou neste site antes!
                        </p>
                    @break
            @endswitch
        </div>
        <div style="display: flex;width: 100%;margin: 10px">
            <div style="display: flex;flex: 1;">
                <div>
                    <div style="display:flex;flex-direction:column;background-color: #D9D9D9; width: 300px;align-items:center;margin-top: 20px">
                        <p class="notification_title">NOTIFICAÇÕES</p>
                        <p style="padding: 30px 5px 5px 5px">
                            Olá, o hemocentro avisa que recebemos uma notificação que uma doação foi feita para você, no dia _/_/__.<br/>
                            <br>
                            Você realmente recebeu esta doação?
                        </p>
                        <div style="display: flex;">
                            <button class="notification_button">SIM</button>
                            <button class="notification_button">NÃO</button>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: flex;flex: 1; justify-content:flex-end"> 
                <img style="margin-right: 50px" src="{{asset('images/RegisterImage.png')}}" width="150" alt="">
            </div>
        </div>

        
    </div>

    @livewire('footer')
    @livewireScripts
</body>

</html>