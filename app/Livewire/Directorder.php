<?php

namespace App\Livewire;

use App\Models\Watch;
use Livewire\Component;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
class Directorder extends Component
{
    public $id,$price,$defprice,$watchname;
    public $quantity=1;
    public $username,$email,$contact,$country,$city,$zip,$address,$qty;

    public function render()
    {
        $this->defprice=Watch::find($this->id)->price;
        $this->watchname=Watch::find($this->id)->name;
        $this->qty > $this->quantity && $this->quantity=$this->qty;
        $this->price= Watch::find($this->id)->price*$this->quantity;
        return view('livewire.directorder');
    }

    public function insertOrderDataSession(string $id)
    {     
    
        session([$id=>['username'=>$this->username,'email'=>$this->email,'contact'=>$this->contact,
        'country'=>$this->country,'city'=>$this->city,'zip'=>$this->zip,'address'=>$this->address,'watch_id'=>$this->id,'quantity'=>$this->quantity
        ,'price'=>$this->price
        ]]);   
    }

    public function order($price)
    {  
        if($this->username!='' && $this->email!='' && strlen($this->contact)>=10 && is_numeric($this->contact) && $this->country!='' && $this->zip !='' && $this->address!='')
        {  
        
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setCurrency('USD');
        $paypalToken=$provider->getAccessToken();
        $response=$provider->createOrder([
            'intent'=>'CAPTURE',
            'application_context'=>[

                'return_url'=>route('success'),
                'cancel_url'=>route('cancel')
           
            ],
             'purchase_units'=>[
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $this->price
                    ],
                ]
                ]    
                ]);
        if(isset($response['id']) && $response['id']!==null)
        {
           $this->insertOrderDataSession($response['id']); 
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
    }

    public function navigate($url){
        return $this->redirect($url, navigate: true);
  
    }
}
