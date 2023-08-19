<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class SwitchRole extends Component
{
    public $cid, $role;

    function switchRole(Role $role)
    {
        dd($role);
        $save = currentUser()->update(['current_role_id' => $role->id]);
        if ($save) {
            $this->reset();
            $this->alert('success', 'Role switch to ' . $role->name . ' successfully');
            return redirect('/home')->with('success', 'Role switch to ' . $role->name . ' successfully');
        }
    }



    public function render()
    {
        return view('livewire.switch-role');
    }
}