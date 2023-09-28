<?php

namespace App\View\Components;

use Carbon\Carbon;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Comment as cmt;
class comment extends Component
{
    /**
     * Create a new component instance.
     */

     public $cmnt,$date;
    public function __construct(public $id)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->cmnt=cmt::find($this->id);
        $this->date=Carbon::create($this->cmnt->created_at)->format('j-F-Y');
        $children =cmt::where('parent',$this->id)->get();
        return view('components.comment',['çhildren'=>$children]);
    }
}
