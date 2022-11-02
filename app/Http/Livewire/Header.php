<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    private $selected, $logged;

    public function mount($headerSelected){
        $this->selected = $headerSelected;
        $this->logged = Auth::check();

    }

    public function render()
    {
        return view('livewire.header', ["headerSelected" => $this->selected, "logged" => $this->logged]);
    }
}
