<?php
use Illuminate\Support\Facades\Auth;
?>
@livewireStyles
<div style="display: flex; flex-direction: column; margin: 6px 3px 0px 3px;">
    <div style="height: 40px; background-color: #EEBBB7; margin-bottom: 6px;"></div>
    <div style="background-color: #D9D9D9; padding: 7px; width: 375px;">
        <p>LOCAL: {{$data["place"]}}</p>
        <p>MOTIVO: {{$data["reason"]}}</p>
        <p>QUANTIDADE DE SANGE (ml): {{$data["amount"]}}</p>
        <p>QUANTIDADE DE SANGE DOADA (ml): {{$data["amountdonated"]}}</p>
        <p>TEMPO LIMITE: {{ \Carbon\Carbon::parse($data["limitdate"])->format('d/m/Y')}}</p>
        <img src="{{asset('images/Doe.png')}}" width="150" alt="">
        <div style="margin-top: 100px;">
            @if (Auth::check())
                @if ($data["user_id"] != Auth::user()->id)
                    @livewire('modal-button', ["data" => $data])
                @endif
            @else 
                @livewire('modal-button', ["data" => $data])
            @endif
        </div>
    </div>
</div>
@livewireScripts