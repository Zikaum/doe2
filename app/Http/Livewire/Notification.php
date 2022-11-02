<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Notification extends Component
{

    private $notification, $post;

    public function mount($notification){
        $this->notification = $notification;
        $this->post = Post::where("id", $notification->post_id)->get();
    }

    public function render()
    {
        return view('livewire.notification', ["notification" => $this->notification, "post" => $this->post[0]]);
    }
}
