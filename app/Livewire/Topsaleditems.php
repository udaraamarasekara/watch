<?php

namespace App\Livewire;
use App\Models\Watch;
use Livewire\Component;

class Topsaleditems extends Component
{
    public function render()
    {
        //$topSaleItems =Watch::orderBy('sold','desc')->limit(3)->get();
        return view('livewire.topsaleditems',['topSaleItems'=>[]]);
    }
}
