<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Tooltip extends Component
{
    public $pers, $content;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pers, $content)
    {
        $this->pers = $pers;
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tooltip');
    }
}