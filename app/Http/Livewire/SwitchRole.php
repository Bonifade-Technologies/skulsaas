<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SwitchRole extends Component
{
    use LivewireAlert;
    public $cid, $role;

    function switchRole(Role $role)
    {
        $save = currentUser()->update(['current_role_id' => $role->id]);
        if ($save) {
            $this->reset();
            $this->alert('success', 'Role switch to ' . $role->name . ' successfully');
            return redirect(request()->header('Referer'))->with('success', 'Role switch to ' . $role->name . ' successfully');
        }
    }



    public function render()
    {
        return view('livewire.switch-role');
    }
}