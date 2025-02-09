<?php

namespace App\Livewire;

use App\Models\post;
use Livewire\Component;

class Profilebref extends Component
{
    public $page;
    public function mount($page){
        $this->page=$page;

    }
    public function render()
    {
        $posts=post::all();
        return view('livewire.profilebref',["posts"=>$posts]);
    }
}
