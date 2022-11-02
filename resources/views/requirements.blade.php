<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/requirements.css') }}" />
  <title>Doe</title>
  @livewireStyles
</head>
<body style="margin: 0px">

  @livewire('header', ['headerSelected' => 1])

  <div class="main">
      <div>
        <div style="display: flex;flex-direction:column;">
          <div>
            <h1 class="title">Por que doar?</h1>
            <img src="{{asset('images/StartImage.png')}}" width="350px" alt="Doe sangue"/>
            <p>
              A doação de sangue é um ato voluntário e altruísta de extrema importância, pois o sangue humano não pode ser fabricado artificialmente.
              Doar Sangue é um processo simples, rápido e seguro. Em muitos casos, a transfusão de sangue é a única esperança de vida para alguns pacientes. Tem sempre alguém esperando doação. É um procedimento totalmente seguro. O volume coletado é de cerca de 450 ml (padrão internacional), o que representa uma fração muito pequena do total de sangue de um adulto.
              <br/>O volume doado é reposto naturalmente pelo organismo em 24h após a doação. O doador não se expõe a nenhum risco de contaminação, pois todo o material utilizado é estéril e descartável. A doação de sangue não engorda e nem emagrece, não afina e nem engrossa o sangue. Não é necessário jejum, porém após o almoço ou ingestão de alimentos gordurosos pede-se um intervalo de 3 horas para iniciar a doação. Não exige mais doações, ou seja, quem doa uma vez, não precisa obrigatoriamente doar novamente.
            </p>
            
          </div>
    
        </div>
          <div>
            <h1 class="title">O que é necessário?</h1>
            <p>
              Apresentar um documento oficial com foto (RG, CNH, etc.) em bom estado de conservação;<br/>
              Ter idade entre 16 e 69 anos desde que a primeira doação seja realizada até os 60 anos (menores de idade precisam de autorização e presença dos pais no momento da doação);<br/>
              Estar em boas condições de saúde;<br/>
              Pesar no mínimo 50 kg;<br/>
              Não ter consumido bebida alcoólica nas últimas 12 horas;<br/>
              Após o almoço ou ingestão de alimentos gordurosos, aguardar 3 horas. Não é necessário estar em jejum;<br/>
              Se fez tatuagem e/ou piercing, aguardar 12 meses. Exceto para região genital e língua (12 meses após a retirada);<br/>
              Se passou por endoscopia ou procedimento endoscópico, aguardar 6 meses;<br/>
              Não ter tido gripe ou resfriado nos últimos 30 dias;<br/>
              Não ter tido Sífilis, Doença de Chagas ou AIDS;<br/>
              Não ter diabetes em uso de medicações;<br/>
            </p>
        </div>
        <div>
          <h1 class="title">Etapas</h1>
          <p>
            Etapa 1 - Registro do doador: o doador é cadastrado e é feita sua identificação com o registro de algumas informações básicas, tais como nome, sexo, idade, profissão e endereço. Nessa etapa, o candidato apresenta documento emitido por órgão oficial com fotografia.<br/>
            Etapa 2 - Triagem clínica: nessa etapa, são analisados critérios, como peso, a temperatura, a pressão arterial, entre outros. Também é feita uma entrevista, que é completamente sigilosa e visa a identificar, por exemplo, situações em que o sangue do doador possa ter sido contaminado.<br/>
            Etapa 3 - Triagem sorológica: nessa etapa, são feitos testes laboratoriais para verificar se o sangue está em condições de ser usado.<br/>
          </p>
        </div>
        <div>
          <h1 class="title">Exames que serão pedidos</h1>
          <p>
            TRIAGEM SOROLÓGICA<br/>
            Hepatite B;<br/>
            Hepatite C;<br/>
            Doença de Chagas;<br/>
            Sífilis;<br/>
            AIDS;<br/>
            HTLV I/II<br/>
            <br/>
            IMUNO-HEMATOLOGIA<br/>
            Determinação do tipo sanguíneo ABO e Rh<br/>
            Pesquisa de anticorpos irregulares.<br/>
          </p>
        </div>
      </div>
  </div>

  @livewire('footer')
  @livewireScripts
</body>
</html>
