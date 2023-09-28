<?php

namespace App\Livewire;

use App\Models\Watch;
use Livewire\Component;
use Auth;
class Singlewatchview extends Component
{
    public $id,$watch;
    public function render()
    {
        $this->watch= Watch::find($this->id);
        return view('livewire.singlewatchview');
    }

    public function buythis()
    {
     return Auth::user() ? $this->redirect('/directOrder/{{$this->id}}',navigate:true):$this->redirect('/userOrder/{{$this->id}}',navigate:true);
    }

    public function navigate($url){
        return $this->redirect($url, navigate: true);
  
    }
}
