<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Session;
class Singleorderguest extends Component
{
    public $id,$order;
    protected $listeners=['returnorder'];
    public function render()
    {
        $this->order=Order::find($this->id);
        return view('livewire.singleorderguest');
    }

    public function returnorder()
    {
      $this->order->status='returned';
      $this->order->save();
      Session::flash('success','you returned order!');
    }
}
