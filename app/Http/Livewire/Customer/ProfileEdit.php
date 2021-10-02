<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Http\Traits\ToastTrait;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileEdit extends Component
{
    use ToastTrait;

    public $customer;

    public $name,$email,$password,$address,$phnum1,$password_confirmation;

    

     public function mount($customer)
    {
        $this->customer=$customer;
        $this->name=$customer->name;
        $this->email=$customer->email;
        $this->phnum1=$customer->phnum1;
        $this->address=$customer->address;
       
    }

    public function updateProfile()
    {
        $value=    $this->validate([
        'name' => 'required|min:3|max:255',
        'email' => 'required|email',
        'password' => ['required','confirmed',Password::defaults()],
        'phnum1' => 'required',
        'address' => 'required|min:5|min:10|max:255',
        ]);
    
        $this->customer->update($value);

        $this->successAlert('Profile Updated Successfully');

        
    
    }
    public function render()
    {
        return view('livewire.customer.profile-edit');
    }
}
