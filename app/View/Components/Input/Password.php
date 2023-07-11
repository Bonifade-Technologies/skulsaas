<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Password extends Component
{
    public $label, $name, $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = 'Password', $name)
    {
        $this->label = 'Password';
        $this->name = $name;
        $this->type = 'password';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input.password');
    }
}