<?php

namespace App\Livewire;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
class Paidorders extends Component
{
    use WithPagination;
    public $id,$link,$status;
    protected $listeners=['setId'];
    public function render()
    {
        $orders= Order::where('status','paid')->paginate(3);
        return view('livewire.paidorders',compact('orders'));
    }
  
    public function statusit($status,$id)
    {
      Order::where('id',$id)->update(['status'=>$status,'link'=>$this->link]);
      session()->flash('success','Status updated!');
    }
}
