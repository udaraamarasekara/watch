<?php

namespace App\Livewire;
use App\Models\Watch;
use Exception;
use Livewire\Component;

class Topsaleditems extends Component
{
    public function render()
    { try{
        $topSaleItems =Watch::orderBy('sold','desc')->limit(3)->get();
        return view('livewire.topsaleditems',['topSaleItems'=>$topSaleItems]);
    }catch(Exception $e){
      dd($e);
    } 
        
    }
}
