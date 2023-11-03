<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DirectCustomer;
use App\Models\Order;
use App\Models\Watch;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Session;
class respController extends Controller
{
    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setCurrency('USD');
        $paypalToken=$provider->getAccessToken();
        $response=$provider->capturePaymentOrder($request->token); 
        if($response['status']=='COMPLETED')
        {
          $orderid= $this->insertToDatabase($response['id']);
          Session::flash('Done','You Placed an Order! Your Order id is :'.$orderid .'<html><br></html>'.'Your secret code is :'.$response['id']);

        }
        return redirect('/');  

    }
    public function insertToDatabase($id)
    {
      $directCus=  DirectCustomer::create([
         'fullname'=>session($id)['username'],
         'email'=>session($id)['email'],
         'contact'=>session($id)['contact'],
         'country'=>session($id)['country'],
         'city'=>session($id)['city'],
         'zip'=>session($id)['zip'],
         'address'=> session($id)['address']
       ]);
      
     $order=  Order::create([
        'price'=>session($id)['price'],
        'watch_id'=>session($id)['watch_id'],
        'quantity'=>session($id)['quantity'],
        'order_code'=>$id,
        'status'=>'paid',
        'orderable_id'=>$directCus->id,
        'orderable_type'=>get_class($directCus)
      ]);

      Watch::where('id',session($id)['watch_id'])->update([
        'sold'=>Watch::find(session($id)['watch_id'])->value('sold')+1,
        'admin_sold'=>Watch::find(session($id)['watch_id'])->value('admin_sold')+1
      ]
      );
      Session::forget($id);
     return $order->id; 
    }

    public function cancel(Request $request)
    {
      Session::flash('error','Something went Wrong');
      return redirect('/');  
    }

    public function successloged(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setCurrency('USD');
        $paypalToken=$provider->getAccessToken();
        $response=$provider->capturePaymentOrder($request->token); 
        if($response['status']=='COMPLETED')
        {
          $orderid= $this->insertToDatabaseloged($response['id']);
          Session::flash('Done','You Placed an Order! Your Order id is :'.$orderid);

        }
        return redirect('/dashboard');  

    }

    public function insertToDatabaseloged($id)
    {
      
     $order=  Order::create([
        'price'=>session($id)['price'],
        'watch_id'=>session($id)['watch_id'],
        'quantity'=>session($id)['quantity'],
        'order_code'=>$id,
        'status'=>'paid',
        'orderable_id'=>session($id)['user'],
        'orderable_type'=>'App\Models\User'
      ]);

      Watch::where('id',session($id)['watch_id'])->update([
        'sold'=>Watch::find(session($id)['watch_id'])->value('sold')+1,
        'admin_sold'=>Watch::find(session($id)['watch_id'])->value('admin_sold')+1
      ]
      );
      Session::forget($id);
     return $order->id; 
    }

    public function cancelloged(Request $request)
    {
      Session::flash('error','Something went Wrong');
      return redirect('/dashboard');  
    }
}
