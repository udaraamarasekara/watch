<?php

namespace App\Livewire;
use App\Models\Order;
use App\Models\Watch;
use Illuminate\Support\Collection;
use Livewire\Component;

class Suggessions extends Component
{
    public $output,$watches,$orders;
    public function render()
    { 
       $this->fetchWatches();
       $this->output=$this->watches;
        return view('livewire.suggessions');
    }

    public function fetchOrders()
    {
       $this->orders=  Order::where('name', 'like', '%'.session('sugest').'%')->get();

    }

    public function fetchWatches()
    {
        $this->watches=Watch::where('name', 'like', '%'.session('sugest').'%')->orWhere('price', 'like', '%'.session('sugest').'%')
        ->orWhere('description', 'like', '%'.session('sugest').'%')->get(['id','name','price','description']);
        foreach($this->watches as $watch)
        {
            $watch['type']='watch';
        }
    }

    public function showit($id,$type)
    {
      if($type=='watch')
      {
        $this->navigate('/singlewatchguest/'.$id);
      }
      else
      {

      }
    }

    public function navigate($url)
    {
        return $this->redirect($url, navigate: true);
    }

}
