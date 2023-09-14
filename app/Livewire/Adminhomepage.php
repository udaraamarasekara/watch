<?php

namespace App\Livewire;

use App\Models\Watch;
use Livewire\Component;

class Adminhomepage extends Component
{
    public $data;
    public function render()
    {
        $this->data=Watch::all();
        return view('livewire.adminhomepage');
    }
    

}
