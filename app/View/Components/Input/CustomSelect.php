<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class CustomSelect extends Component
{
    public $label, $name, $ro;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $ro = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->ro = $ro;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.custom-select');
    }
}