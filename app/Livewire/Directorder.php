<?php

namespace App\Livewire;

use App\Models\Watch;
use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Http;

class Directorder extends Component
{
    public $id,$price,$defprice;
    public $quantity=1;
    public $username,$email,$contact,$country,$city,$zip,$address,$cardNumber,$expirationMonth,$expirationYear,$cvv;

    public function render()
    {
        $this->defprice=Watch::find($this->id)->price;
        $this->price= Watch::find($this->id)->price*$this->quantity;
        return view('livewire.directorder');
    }

    public function order($price)
    {  
        $this->price=$price;
        // $validated=$this->validate(['id'=>'required','username'=>'required','country'=>'required','city'=>'required','zip'=>'required','address'=>'required','contact'=>'numeric|min:10|required']);
        // dd($validated->toArray());
        $response = Http::post('https://api.2checkout.com/rest/6.0/sales', [
            'merchantCode' => '254708276780',
            'secretKey' => 'PH7AUheFDw30y*lmv@&C',
            'currency' => 'USD', // Set to your desired currency
            'total' => $this->price,
            'token' => $this->generatePaymentToken(),
            'demo'=>true
        ]);
      dd($response);
        if ($response->successful()) {
            // Order::create($validated);
            $this->username=""; 
            $this->contact=""; 
            $this->id="";  
            $this->country=""; 
            $this->city=""; 
            $this->zip=""; 
            $this->address=""; 
            session()->flash('success', 'Payment successful');
        } else {
            // Payment failed
            session()->flash('error', 'Payment failed');
        }
        
    }

    public function navigate($url){
        return $this->redirect($url, navigate: true);
  
    }

    public function generatePaymentToken()
    {
        $response = Http::post('https://api.2checkout.com/tokenize', [
            'sellerId' => 'your_seller_id',
            'publicKey' => 'your_public_key',
            'cardNumber' => $this->cardNumber,
            'expirationMonth' => $this->expirationMonth,
            'expirationYear' => $this->expirationYear,
            'cvv' => $this->cvv,
        ]);
        if ($response->successful()) {
            $token = $response->json()['token'];
            return $token;
        } else {
            // Handle token generation failure
            return null;
        }
    }
  
}
