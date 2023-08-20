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