<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Watch;

class Guesthome extends Component
{
    public $watches;
    public function render()
    {
        $this->watches=Watch::all(); 
        return view('livewire.guesthome');
    }
}
