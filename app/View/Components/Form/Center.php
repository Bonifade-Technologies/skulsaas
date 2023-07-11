<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Center extends Component
{
    public $title;
    public $update;
    public $header;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $update, $header = "Add")
    {
        $this->title = $title;
        $this->update = $update;
        $this->header = $header;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.center');
    }
}