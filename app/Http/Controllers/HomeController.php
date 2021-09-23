<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $topitems=Item::select('img1','id','name')->latest()->take(10)->get();
      return view('customer.home',compact('topitems'));
  }
  public function shop()
  {
    return view('customer.shop');
  }
}
