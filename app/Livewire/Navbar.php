<?php

namespace App\Livewire;
use illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.navbar');
    }

    public function logout()
    {
       Auth::logout();
       return $this->redirect('/', navigate: true);

    }
   
}
