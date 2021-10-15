<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed',Password::min(8)->mixedCase()->symbols()],
            'address' => ['required', 'min:5', "max:255"],

        ]);

        $customer= Customer::create([
                'name' =>$request->name,
                'email' =>$request->email,
                'password' =>Hash::make($request->password),
                'address' =>$request->address,
        ]);
        // dd($customer);

         event(new Registered($customer));

        Auth::guard('customer')->login($customer);

        return redirect(RouteServiceProvider::CUSTOMER_HOME);


    }
    // start of customer login methods 
    public function viewlogin()
    {
        return view('customer.auth.login');
    }
    public function login(LoginRequest $request)
    {
   
        if (! Auth::guard('customer')->attempt($request->only('email', 'password'))) {
           
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }


        return redirect()->route('home.shop');
    }
    public function logout(Request $request)
    {
         Auth::guard('customer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('customer.viewlogin');
    }
    //end of customer login methods

    public function show(Customer $customer)
    {

        return view('customer.auth.profile',compact('customer'));
    }
    public function orderlists()
    {
        if(!auth()->guard('customer')->user()) abort(403);

        return view('customer.orderlists');
    }
    public function orderdetail(Order $order)
    {
        if(!$order->customer_id==auth()->guard('customer')->id()) return abort(403);

        return view('customer.orderdetail',[
              'order'=> $order,
        'order_records'=>$order->order_records()->with('item_detail')->get(),
        ]);
    }

}
