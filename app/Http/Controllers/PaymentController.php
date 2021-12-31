<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
   public function show(Order $order)
   {
       if(!$order->customer_id==auth()->guard('customer')->id()){
            abort(403);
       }
       return view('customer.payment',compact('order'));
   }
   public function store(Request $request)
   {
       $order=Order::find($request->order_id);
      $data= $request->validate(['payment_method'=>"required",'payment_screenshot'=>"required",'desc'=>'required|min:3|max:255']);
    
        $order->payment()->create([ "payment_method"=>$request->payment_method,
                                "payment_screenshot"=>$request->payment_screenshot->storeAs('payment',$order->customer->name.'-'.$order->id.''.$request->payment_screenshot->getClientOriginalName()),
                                "desc"=>$request->desc
                            ]);

        $order->update(['payment_status'=>true]);

    return back();
   }
}
