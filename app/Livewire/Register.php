<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;
use Hash;
class Register extends Component
{
    public $username,$email,$password_confirmation,$password,$country,$city,$zip,$address;
    public function render()
    {
        return view('livewire.register');
    }

    public function register()
    {
        if(User::where('password',Hash::make($this->password))->exists())
        {
            session()->flash('password','existing');   
        }
        $validated=$this->validate(['username'=>'required','country'=>'required','city'=>'required','zip'=>'required','address'=>'required','email'=>'unique:users|required','password'=>['required','confirmed',Password::min(8)->numbers()]]);
        User::create($validated);
        $this->username=""; 
        $this->email=""; 
        $this->password_confirmation=""; 
        $this->password=""; 
        $this->country=""; 
        $this->city=""; 
        $this->zip=""; 
        $this->address=""; 
        session()->flash('success','You registered');
        return $this->redirect('/login',navigate:true);
    }
    public function navigate($url){
        return $this->redirect($url, navigate: true);
  
    }
}
