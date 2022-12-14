<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
  <title>Doe</title>
  @livewireStyles
</head>
<body style="margin: 0px; width: 100%;">

  @livewire('header', ['headerSelected' => 0])

  <div class="main">
    @if ($posts)
        @foreach ($posts as $post)
          @livewire('post', ['data' => $post])
        @endforeach
    @endif
    
  </div>

  @livewire('footer')
  @livewireScripts
</body>
</html>
