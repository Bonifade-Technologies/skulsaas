<?php

namespace App\Http\Livewire;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Tenants extends Component
{
    use LivewireAlert, WithPagination;
    public $name, $status, $domain, $tenant;
    public $cid;
    public $update = false;
    public $form = false;

    public ?array $checked = [];
    public $perPage = 25;
    public $sortField = 'id';
    public $sortAsc = true;
    public $search = '';

    function showForm()
    {
        $this->form = true;
    }

    public function sortBy($field)
    {

        if ($this->sortField == $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }
    function save()
    {
        $data = $this->validate([
            'name' => ['required', 'unique:tenants,name'],
            'domain' => ['nullable', 'unique:tenants,domain', 'ends_with:'],
            'status' => ['nullable'],
        ]);

        $saved = Tenant::create($data);
        if ($saved) {
            $this->reset();
            $this->alert('success', 'School added successfully');
        }
    }

    function editSchool(Tenant $tenant)
    {
        $this->tenant = $tenant;
        $this->cid = $tenant->id;
        $this->name = $tenant->name;
        $this->domain = $tenant->domain;
        $this->status = $tenant->status;
        $this->form = true;
        $this->update = true;
    }

    function update()
    {
        $data = $this->validate([
            'name' => ['required', 'unique:tenants,name,' . $this->cid],
            'domain' => ['nullable', 'unique:tenants,domain,' . $this->cid],
            'status' => ['nullable'],
        ]);
        $update = $this->tenant->update($data);
        if ($update) {
            $this->reset();
            $this->alert('success', 'School updated successfully');
        }
    }

    public function render()
    {
        $term = "%$this->search%";
        $tenants = Tenant::
            where('name', 'LIKE', $term)
            ->orWhere('status', 'LIKE', $term)
            ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
            ->paginate($this->perPage);
        return view('livewire.tenants', compact(['tenants']));
    }
}