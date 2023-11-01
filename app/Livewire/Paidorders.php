<?php

namespace App\Livewire;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Paidorders extends Component
{
    use WithPagination;
    public $id;
    public function render()
    {
        $orders= Order::where('status','paid')->paginate(3);
        return view('livewire.paidorders',compact('orders'));
    }

    public function updateOrder()
    {

    }
}
