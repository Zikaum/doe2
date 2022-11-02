<link rel="stylesheet" href="{{ asset('css/header.css') }}" />
<header>
    <img id="header-image" src="{{asset('images/DoeAgora.png')}}" alt="Doe Agora"/>
    <nav>
        <div style="display: flex; flex: 1; justify-content: center;">
            <a @if ($headerSelected == 0) class="a_selected" @endif href="/">INICIO</a>
            <a @if ($headerSelected == 1) class="a_selected" @endif href="/requirements">DESEJA DOAR?</a>
            @if ($logged)
                <a @if ($headerSelected == 4) class="a_selected" @endif href="/personal_space">ESPAÇO PESSOAL</a>
                <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">SAIR</a>  
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                </form>  
            @endif
        </div>
        @if (!$logged)
            <div class="login">
                <div @if ($headerSelected == 2) class="a_selected" @endif>
                    <img width="40" src="{{asset('images/GroupIcon.png')}}" alt="Cadastre-se" />
                    <a href="/register">CADASTRE-SE</a>
                </div>
                <div @if ($headerSelected == 3) class="a_selected" @endif>
                    <img width="30px" src="{{asset('images/ProfileIcon.png')}}" alt="Entre" />
                    <a href="/login">ENTRAR</a>
                </div>
            </div>
        @endif
    </nav>
</header>
