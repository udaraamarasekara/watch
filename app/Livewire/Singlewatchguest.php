<?php

namespace App\Livewire;
use App\Models\Watch;

use Livewire\Component;

class Singlewatchguest extends Component
{
    public $id,$watch;
    public function render()
    {      
        $this->watch= Watch::find($this->id);
        return view('livewire.singlewatchguest');
    }
    public function navigate($url){
        return $this->redirect($url, navigate: true);
  
    }
}
