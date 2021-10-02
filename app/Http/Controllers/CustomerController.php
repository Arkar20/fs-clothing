<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{
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


        return redirect('/');
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

}
