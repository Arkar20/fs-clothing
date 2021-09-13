<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Traits\ToastTrait;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\TableHeadersTrait;
use Illuminate\Validation\Rules\Password;

class ManageTable extends Component
{
    use ToastTrait,TableHeadersTrait,WithPagination;
    protected $listeners = ['confirmed'];

    public $name;
    public $email;
    public $phnum1;
    public $phnum2;
    public $address;
    public $nrc;
    public $role;
    public $password;

    public $search;

    public $userToDelete;
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function store()
    {
         $value= $this->validate([
            'name'=>'required|min:5',
            'email'=>['required','email'],
            'phnum1'=>'required|min:7|max:10',
            'phnum2'=>'required|min:7|max:10',
            'address'=>'required|min:5|max:255',
            'nrc'=>'required|min:7|max:22',
            'role'=>'required|min:3',
            'password' => ['required', 'confirmed', Password::defaults()]
]);

         User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phnum1'=>$this->phnum1,
            'phnum2'=>$this->phnum2,
            'address'=>$this->address,
            'nrc'=>$this->nrc,
            'role'=>$this->role,
            'password' => Hash::make($this->password),
         ]);

         $this->successAlert('A Staff has Registered Successfully');
    }

    public function delete(User $user)
    {
        $this->confirmDialog();
        $this->userToDelete = $user;
    }

    public function confirmed()
    {
        if(auth()->id()=== $this->userToDelete->id){
             return  $this->errorAlert('You Cannot Delete Your Own Account');
        }

        $this->userToDelete->delete();

        $this->successAlert('A Staff has Deleted Successfully');

    }

    public function render()
    {
        return view('livewire.admin.manage-table',[
                            'users'=>User::exclude()
                                ->filterSearch('name',$this->search)
                                ->filterSearch('email',$this->search)
                                ->filterSearch('phnum1',$this->search)
                                ->filterSearch('phnum2',$this->search)
                                ->filterSearch('address',$this->search)
                                ->filterSearch('nrc',$this->search)
                                ->filterSearch('role',$this->search)
                            
                            ->paginate(10),
                            'headers' => $this->getHeaders('users')    
                        ]);
    }
}
