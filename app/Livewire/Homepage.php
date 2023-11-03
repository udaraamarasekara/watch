<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Watch;
use Livewire\WithPagination;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Auth;
class Homepage extends Component
{  
    use WithPagination;
    public $qty,$watch;
    public $quantity=1;
    public function render()
    {
        $data=Watch::paginate(10);
        return view('livewire.homepage',['data'=>$data]);
    }

    public function order($id)
    {           
        $this->qty > $this->quantity && $this->quantity=$this->qty;
        $this->watch= Watch::find($id);
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
