<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Watch;
use App\Models\Comment;
use Livewire\WithPagination;

class Guesthome extends Component
{
    use WithPagination;
    private $paglen=3;
    public function render()
    {
        if(!session()->has('page'))
        {
         session(['page'=>1]); 
        }
        $comments=Comment::paginate(10);
        $watches=Watch::all(); 
        return view('livewire.guesthome',['watches'=>$watches,'comments'=>$comments]);
    }

    public function navigate($url)
    {
     return $this->redirect($url, navigate: true);
    }
    public function next()
    {
      if(session('page') < Watch::count()/$this->paglen)
      {
        session(['page'=>session('page')+1]);
        return $this->redirect('/?page='.session('page'),navigate:true);

      }
    }

    
    public function prev()
    {
      if(session('page') > 0)
      {
        session(['page'=>session('page')-1]);
        return $this->redirect('/?page='.session('page'),navigate:true);

      }
    }
}
