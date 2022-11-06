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
                    @if (count($myPosts) > 0)
                        @foreach ($myPosts as $myPost)
                            <div class="request">
                                <p class="request_text">
                                    <strong>Pedido:</strong> #{{$myPost->id}} <br>
                                    <strong>Dia limite:</strong> {{\Carbon\Carbon::parse($myPost["limitdate"])->format('d/m/Y')}} <br>
                                    <strong>Local:</strong> {{$myPost->place}} <br>
                                    <strong>Status:</strong> {{$myPost->active ? "Ativo" : "Inativo"}}<br>
                                    <strong>Quantidade:</strong> {{$myPost->amount}}ml de sangue <br>
                                    <strong>Quantidade doada:</strong> {{$myPost->amountdonated}}ml
                                </p>
                                <div class="request-form">
                                    <form action="/personal_space/my_requests/delete" method="POST">
                                        @csrf
                                        <input type="text" name="post_id" value="{{$myPost["id"]}}" hidden>
                                        <button class="request_button">APAGAR</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                    <span style="font-size: 16pt;">Você não tem pedidos registrados</span>
                    @endif

                    @break
                @case(2)
                    
                        <div>
                            <form action="/personal_space/make_request" method="POST">
                                @csrf
                                <div>
                                    <label for="place">Lugar da doação: </label>
                                    <input type="text" name="place" required>
                                </div>
                                <p class="error">{{ $errors->first('place') }}</p>
                                <div>
                                    <label for="place">Motivo da doação: </label>
                                    <input type="text" name="reason" required>
                                </div>
                                <p class="error">{{ $errors->first('reason') }}</p>
                                <div>
                                    <label for="limitdate">Data limite: </label>
                                    <input class="inputdate" type="date" name="limitdate" required>
                                </div>
                                <p class="error">{{ $errors->first('limitdate') }}</p>
                                <div>
                                    <label for="place">Quantidade de sangue (ml): </label>
                                    <input class="short_input" type="number" name="amount" min="1" required>
                                </div>
                                <p class="error">{{ $errors->first('amount') }}</p>
                                <button class="request_button">FAZER PEDIDO</button>
                            </form>
                        </div>
                    @break
                @default
                        <p class="donation">
                            Bem vindo ao doe sangue!<br/>
                            Se deseja ajudar alguem com uma doação de sangue, acesse o <a href="/">início</a>
                            <br><br><br><br><br>
                            @if ($lastDonation)
                                Você doou pela última vez em {{$lastDonation}}, obrigado por ajudar o próximo!
                            @else
                                Você nunca doou conosco antes!
                            @endif
                        </p>
                    @break
            @endswitch
        </div>
        <div id="notifications-area">
            <div id="notifications-area-content">

                @if ($notifications)
                    @foreach ($notifications as $notification)
                        @livewire('notification', ['notification' => $notification])
                    @endforeach
                @endif

            </div>
            <div style="display: flex;flex: 1; justify-content:flex-end;"> 
                <img id="image-view" style="margin-right: 50px;" src="{{asset('images/RegisterImage.png')}}" width="150" alt="">
            </div>
        </div>

        
    </div>

    <script>
        const areaContent = document.getElementById("notifications-area-content");
        const area = document.getElementById("notifications-area");
        document.getElementById("image-view").style.display = (areaContent.offsetWidth < area.offsetWidth) ? "block" : "none";
        console.log(areaContent.offsetWidth);
        console.log(area.offsetWidth);
        console.log(areaContent.offsetWidth < area.offsetWidth);
      </script>

    @livewire('footer')
    @livewireScripts
</body>

</html>