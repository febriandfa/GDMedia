<?php

namespace App\View\Components\Guru\Submateri;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubmateriCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $desc,
        public string $file,
        public string $id
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.guru.submateri.submateri-card');
    }
}
