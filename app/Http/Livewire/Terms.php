<?php

namespace App\Http\Livewire;

use App\Models\Term;
use App\Models\Year;
use Livewire\Component;

class Terms extends Component
{
    public $name, $start, $end, $dso, $cid, $year_id;

    function addSession()
    {

        $data = $this->validate([
            'name' => 'required|unique:years',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
        ]);

        $saved = Year::create($data);
        if ($saved) {
            $this->reset();
        }
    }

    function setYear(Year $year)
    {
        $this->year_id = $year->id;
    }
    function addTerm()
    {

        $data = $this->validate([
            'name' => ['required'],
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'dso' => 'integer',
        ]);

        $saved = Term::create($data);
        if ($saved) {
            $this->reset();
        }
    }
    public function render()
    {
        return view('livewire.terms');
    }
}