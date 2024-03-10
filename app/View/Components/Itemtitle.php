<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Itemtitle extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $main,
        public string $mainLink,
        public string $sub,
        public string $subLink,
        public string $item
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.itemtitle');
    }
}
