<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class staticimageslider extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $watch)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.staticimageslider');
    }
}
