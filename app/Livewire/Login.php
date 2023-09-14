<?php

namespace App\Livewire;
use illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;

class Login extends Component
{

    public $email,$password;
    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    { 


        if(Auth::attempt(['email'=>$this->email,'password'=>$this->password]))
        {
          return Auth::user()->admin ? $this->redirect('/admindashboard', navigate: true):$this->redirect('/userdashboard', navigate: true);
        }
        else{
            if(User::where('email',$this->email)->exists())
            {
                session()->flash('password','password wrong');
            }
            else
            {
                session()->flash('email','email wrong');
  
            }
        }
        $this->email='';
        $this->password='';
    }
    public function navigate($url){
        return $this->redirect($url, navigate: true);
  
    }
}
