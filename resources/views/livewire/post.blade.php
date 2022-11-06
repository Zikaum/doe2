<?php
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;
use App\Models\User;

$user = User::where("id", $data["user_id"])->get()[0];

?>
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
@livewireStyles
<div class="post-container">
    <div class="post-header"></div>
    <div class="post-body">
        <p>PESSOA: {{$user["name"]}}</p>
        <p>LOCAL: {{$data["place"]}}</p>
        <p>MOTIVO: {{$data["reason"]}}</p>
        <p>QUANTIDADE DE SANGUE (ml): {{$data["amount"]}}</p>
        <p>QUANTIDADE DE SANGUE DOADA (ml): {{$data["amountdonated"]}}</p>
        <p>TIPO SANGUÍNEO: {{$user["bloodtype"]}}</p>
        <p>TEMPO LIMITE: {{ Carbon::parse($data["limitdate"])->format('d/m/Y')}}</p>
        <img src="{{asset('images/Doe.png')}}" width="150" alt="">
        <div style="margin-top: 100px;">
            @if (Auth::check())
            @if ($data["user_id"] != Auth::user()->id && CanDonate($user["bloodtype"], Auth::user()->bloodtype))
                    @livewire('modal-button', ["data" => $data])
                @endif
            @else 
                @livewire('modal-button', ["data" => $data])
            @endif
        </div>
    </div>
</div>
@livewireScripts