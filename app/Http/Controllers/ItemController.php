<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Purchase;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function showdashboard()
    {
        return view('admin.dashboard',[
            'order_count'=>Order::all()->count(),
            'purchase_count' =>Purchase::all()->count(),
            'total_staffs'=>User::all()->count(),
        ]);
    }
}
