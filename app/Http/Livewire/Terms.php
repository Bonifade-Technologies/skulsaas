<?php

namespace App\Http\Livewire;

use App\Models\Term;
use App\Models\Year;
use App\Rules\SessionRule;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Terms extends Component
{
    use LivewireAlert, WithPagination;
    public $name, $start, $end, $session_name, $session_start, $session_end, $dso, $cid, $year_id, $terms, $activeSession;
    public $update = false;
    public $form = false;
    public $confirm = false;

    public ?array $checked = [];
    public $perPage = 4;
    public $sortField = 'id';
    public $sortAsc = true;
    public $search = '';

    protected $listeners = [
        'deleteConfirm' => 'delete',
        'deleteMutipleConfirm' => 'buckDelete'
    ];

    protected $messages = [
        'session_name.unique' => 'Session already existed',
        'session_name.size' => 'Session must be exact 7 characters in this format 2014/15, 2021/22 etc.',
        'session_name.starts_with' => 'Session must start with real date and in this format e.g 2014/15, 2021/22 etc.',
    ];

    function showForm()
    {
        $this->reset();
        $this->form = true;

    }

    function addSession()
    {
        $data = $this->validate([
            'session_name' => ['required', 'unique:years,session_name', 'starts_with:20', new SessionRule, 'size:7'],
            'session_start' => 'required|date',
            'session_end' => 'required|date|after:start',
        ]);

        $saved = Year::create($data);
        if ($saved) {
            $this->reset();
            $this->setYear($saved);
            $this->alert('success', 'Session created successfully');
        }
    }

    function setYear(Year $year)
    {
        $this->activeSession = $year;
        $this->year_id = $year->id;
    }
    function addTerm()
    {

        $data = $this->validate([
            'name' => ['required'],
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'dso' => 'nullable|integer',
        ]);

        $terms = Term::where('year_id', $this->year_id)->pluck('name')->toArray();
        if (count($terms) === 3) {
            $this->alert('error', 'Maximum mumber of term reach');
        } elseif (in_array($data['name'], $terms)) {
            $this->alert('warning', 'Duplicate Term, term already existed');
        } else {
            $saved = Term::create(array_merge(['year_id' => $this->year_id], $data));
            if ($saved) {
                $this->reset();
                $year = Year::find($saved->year_id);
                $this->setYear($year);
                $this->alert('success', 'Term added to session successfully');
            }
        }


    }

    function editTerm(Term $term)
    {
        if ($term->id != $this->lastTerm()->id || $term->year_id != $this->lastTerm()->year_id) {
            return $this->alert('error', 'You cannot edit term from pass session');
        } else {
            $this->name = $term->name;
            $this->start = $term->start->format('Y-m-d');
            $this->end = $term->end->format('Y-m-d');
            $this->dso = $term->dso;
            $this->year_id = $term->year_id;
            $this->cid = $term->id;
            $this->update = true;
        }

    }

    function updateTerm()
    {
        $data = $this->validate([
            'name' => ['required'],
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'dso' => 'nullable|integer',
        ]);
        $terms = Term::where('year_id', $this->year_id)->pluck('name')->toArray();
        // if (in_array($data['name'], $terms) && count($terms) < 3) {
        //     $year = $this->year_id;
        //     $this->alert('warning', 'Duplicate Term, term already existed');
        //     $this->reset();
        //     $this->year_id = $year;
        // } else {
        //     $update = Term::find($this->cid)->update($data);
        //     $yearId = $this->year_id;
        //     if ($update) {
        //         $this->reset();
        //         $year = Year::find($yearId);
        //         $this->setYear($year);
        //         $this->alert('success', 'Term updated successfully');
        //     }
        // }
        $update = Term::find($this->cid)->update($data);
        $yearId = $this->year_id;
        if ($update) {
            $this->reset();
            $year = Year::find($yearId);
            $this->setYear($year);
            $this->alert('success', 'Term updated successfully');
        }

    }

    function lastTerm()
    {
        return Term::orderByDesc('id')->first();
    }

    public function confirmDelete(Term $term)
    {
        if ($term->id != $this->lastTerm()->id) {
            return $this->alert('error', 'You cannot delete term from pass session');
        } else {
            $this->cid = $term->id;
            $this->confirm = true;
        }

    }
    public function deleteSession(Year $year)
    {
        $del = $year->delete();
        if ($del) {
            $this->reset();
            // $this->resetPage();
            $this->alert('success', 'Session has been removed successfully');
            return redirect()->back();
        }

    }

    public function delete()
    {

        $term = Term::findOrFail($this->cid);
        $true = $term->delete();
        $yearId = $term->year_id;

        if ($true) {
            $this->reset();
            $year = Year::find($yearId);
            $this->setYear($year);
            $this->alert('success', 'Term deleted successfully');
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
        $years = Year::where('session_name', 'LIKE', $term)->latest()->simplePaginate($this->perPage);
        return view('livewire.terms', compact(['years', 'currentSessionTerms']));
    }
}