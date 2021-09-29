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
  public function show($name)
  {
      $item=Item::where('name',$name)->firstorFail(); 
      $recommend_items=$item->where('brand_id',$item->brand_id)->take(5)->get();

      return view('customer.detail',compact('item','recommend_items'));
  }
}
