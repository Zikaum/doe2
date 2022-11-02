<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Post extends Component
{

    private $data;

    public function mount($data){
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.post', ["data" => $this->data]);
    }
}
