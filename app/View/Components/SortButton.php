<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SortButton extends Component
{
    public $field, $sortField, $sortAsc;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($field, $sortField)
    {
        $this->field = $field;
        $this->sortField = $sortField;
        $this->sortAsc = true;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sort-button');
    }
}