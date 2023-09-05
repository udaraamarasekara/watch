<?php

namespace App\Livewire;

use Livewire\Component;

class Admindashboard extends Component
{
    protected $listeners =['renda'=>'$render'];
    public function render()
    {
        return view('livewire.admindashboard');
    }
}
