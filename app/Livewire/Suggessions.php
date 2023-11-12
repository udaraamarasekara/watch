<?php

namespace App\Livewire;
use App\Models\DirectCustomer;
use App\Models\Order;
use App\Models\Watch;
use App\Models\User;
use Livewire\Component;
use Session;
use Exception;
class Suggessions extends Component
{
    public $watches,$orders,$ordercode;
    public function render()
    { 
      try{
       $this->fetchWatches();
       $this->fetchOrders();
      }catch(Exception $e){
        dd($e);
      }
        return view('livewire.suggessions');
    }

    public function fetchOrders()
    {
       $this->orders=  Order::where('id', 'like', '%'.session('sugest').'%')->orWhere('watch_id',
       Watch::where('name', 'like', '%'.session('sugest').'%')->orWhere('price', 'like', '%'.session('sugest').'%')
        ->orWhere('description', 'like', '%'.session('sugest').'%')->value('id'))->orWhere([['orderable_type','App\Models\DirectCustomer'],
        ['orderable_id',
        DirectCustomer::where('fullname', 'like', '%'.session('sugest').'%')->orWhere('country', 'like', '%'.session('sugest').'%')
        ->orWhere('city', 'like', '%'.session('sugest').'%')->orWhere('zip', 'like', '%'.session('sugest').'%')->
        orWhere('address', 'like', '%'.session('sugest').'%')->
        orWhere('contact', 'like', '%'.session('sugest').'%')->
        orWhere('email', 'like', '%'.session('sugest').'%')
        ->value('id')
        ]]
       )->
       orWhere([['orderable_type','App\Models\User'],
        ['orderable_id',
        User::where('username', 'like', '%'.session('sugest').'%')->orWhere('country', 'like', '%'.session('sugest').'%')
        ->orWhere('city', 'like', '%'.session('sugest').'%')->orWhere('zip', 'like', '%'.session('sugest').'%')->
        orWhere('address', 'like', '%'.session('sugest').'%')->
        orWhere('contact', 'like', '%'.session('sugest').'%')->
        orWhere('email', 'like', '%'.session('sugest').'%')
        ->value('id')
        ]]
       )->
       get();
      
    }

    public function fetchWatches()
    {
        $this->watches=Watch::where('name', 'like', '%'.session('sugest').'%')->orWhere('price', 'like', '%'.session('sugest').'%')
        ->orWhere('description', 'like', '%'.session('sugest').'%')->get(['id','name','price','description']);
      
    }

    public function showit($id,$type)
    {
      if($type=='watch')
      {
        $this->navigate('/singlewatchguest/'.$id);
      }
      else
      {
        if($this->ordercode==Order::find($id)->order_code) 
         {
          session(['vieworder'.$id=>true]);
          $this->navigate('/singleorderguest/'.$id);
         }
         else
         {
          session()->flash('error','Invalid Order_code');
         }  
      }
    }

    public function navigate($url)
    {
        return $this->redirect($url, navigate: true);
    }
    public function setit(){

    }

}
