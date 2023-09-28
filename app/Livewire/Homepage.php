<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Watch;
use Livewire\WithPagination;

class Homepage extends Component
{  
    use WithPagination;

    public function render()
    {
        $data=Watch::paginate(10);
        return view('livewire.homepage',['data'=>$data]);
    }
    
}
