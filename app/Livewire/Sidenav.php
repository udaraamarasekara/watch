<?php

namespace App\Livewire;

use Livewire\Component;

class Sidenav extends Component
{

    public $sidenavVisibility="false";
    public function render()
    {
        return view('livewire.sidenav');
    }
}
