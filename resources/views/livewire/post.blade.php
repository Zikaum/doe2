@livewireStyles
<div style="display: flex; flex-direction: column; margin: 6px 3px 0px 3px;">
    <div style="height: 40px; background-color: #EEBBB7; margin-bottom: 6px;"></div>
    <div style="background-color: #D9D9D9; padding: 7px; width: 300px;">
        <p>LOCAL: {{$data["place"]}}</p>
        <p>QUANTIDADE DE BOLSAS: {{$data["amount"]}}</p>
        <p>MOTIVO: {{$data["reason"]}}</p>
        <img src="{{asset('images/Doe.png')}}" width="150" alt="">
        @livewire('modal-button', ["data" => $data])
    </div>
</div>
@livewireScripts