<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Label extends Component
{
    public $name, $label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label)
    {
        $this->label = $label;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.label');
    }
}