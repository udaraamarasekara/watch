<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Watch;
use App\Models\Comment;
use Livewire\WithPagination;

class Guesthome extends Component
{
    use WithPagination;

    public function render()
    {
        $comments=Comment::paginate(10);
        $watches=Watch::all(); 
        return view('livewire.guesthome',['watches'=>$watches,'comments'=>$comments]);
    }

    public function navigate($url)
    {
     return $this->redirect($url, navigate: true);
    }
}
