<?php

namespace App\View\Components\Siswa\Tugas;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListTugasCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $nama,
        public string $deadline,
        public string $nilai,
        public string $percentage,
        public string $kelompok
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.siswa.tugas.list-tugas-card');
    }
}
