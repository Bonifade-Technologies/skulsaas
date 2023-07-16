<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class SingleSelect extends Component
{
    public $label, $name, $list, $ro;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $list, $ro = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->ro = $ro;
        $this->list = $list;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.single-select');
    }
}