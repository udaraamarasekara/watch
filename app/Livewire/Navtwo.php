<?php

namespace App\Livewire;
use Livewire\Component;

class Navtwo extends Component
{
   
    public function render()
    {
        return view('livewire.navtwo');
    }

    public function navigate($url){
        return $this->redirect($url, navigate: true);
  
    }
}
