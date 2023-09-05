<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class imagecard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $price,public string $name,public string $sold,public string $image )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.imagecard');
    }
}
