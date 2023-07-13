<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Badge extends Component
{
    public $name, $color;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $color = "gray")
    {
        $this->name = $name;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.badge');
    }
}