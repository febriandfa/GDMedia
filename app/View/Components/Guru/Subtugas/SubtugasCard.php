<?php

namespace App\View\Components\Guru\Subtugas;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubtugasCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $title,
        public string $desc
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.guru.subtugas.subtugas-card');
    }
}
