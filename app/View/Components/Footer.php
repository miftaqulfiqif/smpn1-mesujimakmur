<?php

namespace App\View\Components;

use App\Models\Applogo;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $applogo;
    public function __construct()
    {
        $this->applogo = Applogo::latest()->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
