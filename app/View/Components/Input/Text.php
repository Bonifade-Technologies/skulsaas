<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Text extends Component
{
    public $label, $name, $type, $ro;
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
        $this->type = 'text';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.text');
    }
}