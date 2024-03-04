<?php

namespace App\View\Components\Siswa\Materi;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListMateriCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $mapel,
        public string $id,
        public string $percentage
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.siswa.materi.list-materi-card');
    }
}
