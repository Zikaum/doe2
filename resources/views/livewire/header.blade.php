<link rel="stylesheet" href="{{ asset('css/header.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<header>
    <div class="desktop">
        <img id="desktop-header-image" src="{{asset('images/DoeAgora.png')}}" alt="Doe Agora"/>
        <nav class="desktop-nav">
            <div style="display: flex; flex: 1; justify-content: center;">
                <a @if ($headerSelected == 0) class="a_selected" @endif href="/">INICIO</a>
                <a @if ($headerSelected == 1) class="a_selected" @endif href="/requirements">DESEJA DOAR?</a>
                @if ($logged)
                <a @if ($headerSelected == 4) class="a_selected" @endif href="/personal_space">ESPAÇO PESSOAL</a>
                @endif
            </div>
            @if (!$logged)
            <div class="login">
                <div @if ($headerSelected == 2) class="a_selected" @endif>
                        <img width="40" src="{{asset('images/GroupIcon.png')}}" alt="Cadastre-se" />
                        <a href="/register">CADASTRO</a>
                    </div>
                    <div @if ($headerSelected == 3) class="a_selected" @endif>
                        <img width="30px" src="{{asset('images/ProfileIcon.png')}}" alt="Entre" />
                        <a href="/login">ENTRAR</a>
                    </div>
                </div>
                @endif
                @if ($logged)
                <div style="display: flex;justify-content:flex-start;flex-direction:column">
                    <a class="quit" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">SAIR</a>  
                </div>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                </form>
                @endif
            </nav>
        </div>
        
        <div class="mobile">
            <div style="display: flex;align-items: center;">
                <div style="display: flex;justify-content:center;width:100%;">
                    <img id="mobile-header-image" src="{{asset('images/DoeAgora.png')}}" alt="Doe Agora"/>
                </div>
            </div>
            <nav class="mobile-nav" style="justify-content: center;overflow:auto;">
                <div class="a-container">
                    <a @if ($headerSelected == 0) class="a_selected" @endif href="/">INICIO</a>
                </div>
                <div  class="a-container">
                    <a @if ($headerSelected == 1) class="a_selected" @endif href="/requirements">DESEJA<br>DOAR?</a>
                </div>
                @if ($logged)
                    <div  class="a-container">
                        <a @if ($headerSelected == 4) class="a_selected" @endif href="/personal_space">ESPAÇO<br>PESSOAL</a>
                    </div>
                    <div  class="a-container">
                        <a class="quit" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">SAIR</a>
                    </div>
                @else
                    <div class="a-container">
                        <a @if ($headerSelected == 2) class="a_selected" @endif href="/register">CADASTRO</a>
                    </div>
                    <div class="a-container">
                        <a @if ($headerSelected == 3) class="a_selected" @endif href="/login">ENTRAR</a>
                    </div>
                @endif
            </nav>
        </div>
    </header>
    