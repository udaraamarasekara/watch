<?php

namespace App\Livewire;
use App\Models\Comment;
use Livewire\Component;
use Auth;
class Commentfrm extends Component
{
    public $parent=0;
    public $message='';
    public function render()
    {
        return view('livewire.commentfrm');
    }

    public function addComment()
    {
       Comment::create(['user_id'=>Auth::user()->id,'parent'=>$this->parent,'message'=>$this->message]);
       session()->flash('success','nothing wrong');
       return $this->redirect('/addcomment',navigate:true);

    }
}
