<?php

namespace App\View\Components\Siswa\Tutorial;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TutorialCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $cover,
        public string $sumber,
        public string $nama,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.siswa.tutorial.tutorial-card');
    }
}
