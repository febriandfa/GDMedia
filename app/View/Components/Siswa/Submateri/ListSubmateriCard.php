<?php

namespace App\View\Components\Siswa\Submateri;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListSubmateriCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $index,
        public string $title,
        public string $desc,
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
        return view('components.siswa.submateri.list-submateri-card');
    }
}
