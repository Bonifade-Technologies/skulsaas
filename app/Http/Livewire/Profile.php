<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{
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

    public function render()
    {
        return view('livewire.profile');
    }
}
