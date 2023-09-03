<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;
use Hash;
class Register extends Component
{
    protected $listeners = ['register'=>'register'];
    public $firstname,$lastname,$email,$password_confirmation,$password,$country,$city,$zip,$address;
    public function render()
    {
        return view('livewire.register');
    }

    public function register()
    {
        if(!User::where('password',Hash::make($this->password))->first())
        {
            session()->flash('password','existing');   
        }
        $validated=$this->validate(['firstname'=>'required','lastname'=>'required','country'=>'required','city'=>'required','zip'=>'required','address'=>'required','email'=>'unique:users|required','password'=>['required','confirmed',Password::min(8)->numbers()]]);
      
        User::create($validated);
        session()->flash('success','You registered');
         
    }
}
