<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Http\Traits\ToastTrait;
use Illuminate\Validation\Rule;

class Profiledit extends Component

{
    use ToastTrait;
    public $user;
    public $name;
    public $email;
    public $phnum1;
    public $phnum2;
    public $address;
    public $nrc;
    public $role;

    public function mount($user)
    {
        $this->user=$user;
        $this->name=$user->name;
        $this->email=$user->email;
        $this->phnum1=$user->phnum1;
        $this->phnum2=$user->phnum2;
        $this->address=$user->address;
        $this->nrc=$user->nrc;
        $this->role=$user->role;
    }

    public function updateProfile()
    {
        $value=    $this->validate([
            'name'=>'required|min:5',
            'email'=>['required','email', Rule::unique('users')->ignore($this->user->id)],
            'phnum1'=>'required|min:7|max:10',
            'phnum2'=>'required|min:7|max:10',
            'address'=>'required|min:5|max:255',
            'nrc'=>'required|min:7|max:22',
            'role'=>'required|min:3',
        ]);
    
        $this->user->update($value);

        $this->successAlert('Profile Updated Successfully');

        
    
    }
    public function render()
    {
        return view('livewire.admin.profiledit');
    }
}
