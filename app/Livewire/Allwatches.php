<?php

namespace App\Livewire;
use App\Models\Watch;

use Livewire\Component;
use Livewire\WithPagination;

class Allwatches extends Component
{
    use WithPagination;
    public function render()
    {
        $data=Watch::paginate(10);
        return view('livewire.allwatches',['data'=>$data]);
    }

    public function navigate($url){
        return $this->redirect($url, navigate: true);
  
    }
    
}
