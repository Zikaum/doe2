<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalButton extends Component
{

    private $data;

    public function mount($data){
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.modal-button', ["data" => $this->data]);
    }
}
