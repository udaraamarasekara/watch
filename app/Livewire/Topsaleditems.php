<?php

namespace App\Livewire;
use App\Models\Watch;
use Livewire\Component;

class Topsaleditems extends Component
{
    public function render()
    {
        $topSaleItems =Watch::orderBy('sold','desc')->limit(3)->get();
        foreach($topSaleItems as $item){
            !$item->sold && $item->sold=0;
        }
        return view('livewire.topsaleditems',['topSaleItems'=>$topSaleItems]);
    }
}
