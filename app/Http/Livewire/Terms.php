<?php

namespace App\Http\Livewire;

use App\Models\Term;
use App\Models\Year;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Terms extends Component
{
    use LivewireAlert, WithPagination;
    public $name, $start, $end, $dso, $cid, $year_id, $terms, $activeSession;
    public $update = false;
    public $form = false;

    public ?array $checked = [];
    public $perPage = 3;
    public $sortField = 'id';
    public $sortAsc = true;
    public $search = '';

    function showForm()
    {
        $this->form = true;
    }

    function addSession()
    {
        $data = $this->validate([
            'name' => ['required', 'unique:years'],
            'start' => 'required|date',
            'end' => 'required|date|after:start',
        ]);

        $saved = Year::create($data);
        if ($saved) {
            $this->reset();
            $this->alert('success', 'Session created successfully');
        }
    }

    function setYear(Year $year)
    {
        $this->activeSession = $year;
        // $this->activeSession = $year;
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

    function mount()
    {

        $cur = currentSession();
        if ($cur) {
            $this->activeSession = $cur;
            $this->year_id = $cur->id;
            $this->terms = Term::where('year_id', $cur->id)->latest()->get();
        }
    }
    public function render()
    {
        $currentSessionTerms = $this->activeSession ? $this->activeSession->terms : [];
        $term = "%$this->search%";
        $years = Year::where('name', 'LIKE', $term)->latest()->simplePaginate($this->perPage);
        return view('livewire.terms', compact(['years', 'currentSessionTerms']));
    }
}