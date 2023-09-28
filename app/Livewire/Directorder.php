<?php

namespace App\Livewire;

use App\Models\Watch;
use Livewire\Component;
use App\Models\Order;
class Directorder extends Component
{
    public $id,$price,$defprice;
    public $quantity=1;
    public $username,$email,$contact,$country,$city,$zip,$address;

    public function render()
    {
        $this->defprice=Watch::find($this->id)->price;
        $this->price= Watch::find($this->id)->price*$this->quantity;
        return view('livewire.directorder');
    }

    public function order($price)
    {
        $this->price=$price;
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

    public function navigate($url){
        return $this->redirect($url, navigate: true);
  
    }
  
}
