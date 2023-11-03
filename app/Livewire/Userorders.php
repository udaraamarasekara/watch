<?php

namespace App\Livewire;

use App\Models\Order;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Session;
class Userorders extends Component
{
    use WithPagination;

    public function render()
    {
        $orders=Auth::user()->orders()->paginate(10);
        return view('livewire.userorders',['orders'=>$orders]);
    }

    public function returnorder($id)
    {
      $order=Order::find($id);  
      $order->status='returned';
      $order->save();
      Session::flash('success','you returned order!');
    }
}
