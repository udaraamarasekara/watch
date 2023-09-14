<?php

namespace App\Livewire;
use App\Models\Watch;

use Livewire\Component;

class Allwatches extends Component
{
    public $data;
    public function render()
    {
        $this->data=Watch::all();
        return view('livewire.allwatches');
    }

    public function navigate($url){
        return $this->redirect($url, navigate: true);
  
    }
    
}
