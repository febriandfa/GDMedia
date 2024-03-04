<?php

namespace App\View\Components\Siswa\Referensi;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $nama,
        public string $sumber,
        public string $gambar,
        public string $id,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.siswa.referensi.image-card');
    }
}
