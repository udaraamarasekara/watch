<?php

namespace App\Livewire;
use Livewire\Component;

class Navtwo extends Component
{
    public $sugest;
   
    public function render()
    {
        $this->sugest=session('sugest');
        return view('livewire.navtwo');
    }

    public function navigate($url)
    {
        return $this->redirect($url, navigate: true);
    }

    public function updatedSugest()
    {
      session(['sugest'=>$this->sugest]);
      $this->sugest ? $this->navigate('/search'):$this->navigate('/');
    }
}
