<?php

namespace App\Livewire;

use Livewire\Component;

class Guest extends Component
{
    public $listeners =['navigate'];

    public function render()
    {

        return view('livewire.guest');
    }

  
}
