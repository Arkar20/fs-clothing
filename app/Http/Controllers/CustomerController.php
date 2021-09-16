<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function create()
    {
        return view('customer.login');
    }
    public function store()
    {
        $customer=Customer::first();
        Auth::guard('customer')->login($customer);

        return view('customer.home');
    }
    public function logout(Request $request)
    {
              Auth::guard('customer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('customer.create');
    }
}
