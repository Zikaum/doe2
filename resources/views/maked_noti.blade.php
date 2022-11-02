<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doe</title>
    @livewireStyles
</head>
<body style="margin: 0px">
    @livewire('header', ['headerSelected' => 0])
    
    Obrigado pela doação

    @livewire('footer')
    @livewireScripts
</body>
</html>