<?php

namespace App\Livewire;

use App\Models\Watch;
use Livewire\Component;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

use Auth;
class Singlewatchview extends Component
{
    public $id,$watch;
    public $qty;
    public $quantity=1;
    public function render()
    {
        $this->watch= Watch::find($this->id);
        return view('livewire.singlewatchview');
    }

    public function buythis()
    {
     return Auth::user() ? $this->redirect('/directOrder/{{$this->id}}',navigate:true):$this->redirect('/userOrder/{{$this->id}}',navigate:true);
    }

    public function navigate($url){
        return $this->redirect($url, navigate: true);
  
    }

    public function order($id)
    {           
        $this->qty > $this->quantity && $this->quantity=$this->qty;
        $price=$this->watch->price*$this->quantity; 
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setCurrency('USD');
        $paypalToken=$provider->getAccessToken();
        $response=$provider->createOrder([
            'intent'=>'CAPTURE',
            'application_context'=>[

                'return_url'=>route('successloged'),
                'cancel_url'=>route('cancelloged')
           
            ],
             'purchase_units'=>[
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $price
                    ],
                ]
                ]    
                ]);

        if(isset($response['id']) && $response['id']!==null)
        {
           $this->insertOrderDataSession($response['id'],$price); 
          foreach($response['links'] as $link)
          {
            if($link['rel']==='approve')
            {


            return redirect()->away($link['href']);
            }
           
          } 
           
        }  
        else
        {
         return redirect()->route('cancel');   
        }       

    }
    public function insertOrderDataSession(string $id,$price)
    {     
        session([$id=>['user'=>Auth::user()->id, 'watch_id'=>$this->watch->id, 'price'=>$price,'quantity'=>$this->quantity]]);   
    }
}
