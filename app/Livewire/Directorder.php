<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
class Directorder extends Component
{
    public $id;
    public $username,$email,$contact,$country,$city,$zip,$address;

    public function render()
    {
        return view('livewire.directorder');
    }

    public function order()
    {
        
        $validated=$this->validate(['id'=>'required','username'=>'required','country'=>'required','city'=>'required','zip'=>'required','address'=>'required','contact'=>'numeric|min:10|required',]);
        Order::create($validated);
        $this->username=""; 
        $this->contact=""; 
        $this->id="";  
        $this->country=""; 
        $this->city=""; 
        $this->zip=""; 
        $this->address=""; 
        session()->flash('success','You Placed order');
    }
}
