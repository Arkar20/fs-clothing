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
}
