<?php

namespace App\Http\Livewire;

use App\Rules\UniqueSchoolTypeTenantRule;
use Livewire\Component;
use App\Models\SchoolType;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Settings extends Component
{
    use WithFileUploads, LivewireAlert;
    public $school_name, $name, $school_email, $school_logo, $school_country, $school_phone, $country_code, $currencies, $payment_method, $paystack_pk;
    public $cid;
    public ?array $countries = [];
    public $con;
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

    function showCountry()
    {
        // $results = Http::get('https://restcountries.com/v3.1/all?fields=name,idd,flags,currencies,capital');
        $results = Http::get('http://127.0.0.1:8000/files/responses.json');
        $this->countries = json_decode($results);
        // dd($this->countries[0]);
    }
    function updateSchoolInfo()
    {
        $data = $this->validate(
            [
                'school_name' => 'required',
                'school_country' => 'required',
                'school_phone' => [
                    'required',
                    'digits:10',
                    Rule::unique('settings', 'school_phone')->ignore($this->con->id)
                ],
                'school_email' => [
                    'required',
                    'email',
                    Rule::unique('settings', 'school_email')->ignore($this->con->id)
                ]
            ],
            [
                'school_phone.unique' => 'phone number already exist',
                'school_phone.digits' => 'phone number must be 10 digits number',
                'school_email.unique' => 'email already exist'
            ]
        );

        $saved = $this->con->update($data);
        if ($saved) {
            $this->reset();
            $this->alert('success', 'School info updated successfully');
            $this->mount();
            return redirect()->back();
        }
    }


    function changeSchoolLogo()
    {
        $data = $this->validate(['school_logo' => 'required|image|max:512']);
        $upd = $this->con->update(['school_logo' => $this->school_logo->getClientOriginalName()]);
        if ($upd) {
            $changed = $this->con->addMedia($this->school_logo->getRealPath())
                ->usingName($this->school_logo->getClientOriginalName())
                ->setFileName($this->school_logo->getClientOriginalName())
                ->toMediaCollection('setting');
        }

        if ($changed) {
            $this->reset();
            $this->alert('success', 'Logo updated successfully');
            return $this->mount();
        }
    }

    function removeLogo()
    {
        if ($this->school_logo) {
            $this->reset();
        } else {
            $this->con->getFirstMedia('setting')->delete();
            $this->alert('success', 'Logo removed successfully');
        }

        $this->mount();
    }
    function saveSchoolName()
    {
        $data = $this->validate(
            ['name' => ['required', new UniqueSchoolTypeTenantRule]],
            ['name.unique' => 'School type already exist']
        );
        $data['slug'] = Str::slug($data['name'] . "-" . auth()->user()->current_tenant_id);
        $saved = SchoolType::create($data);
        if ($saved) {
            redirect(request()->header('Referer'));
            return $this->alert('success', 'Schools saved successfully');
        }
    }
    function editType(SchoolType $cat)
    {
        $this->update = true;
        $this->name = $cat->name;
        $this->cid = $cat->id;
    }
    function updateSchoolType()
    {
        $data = $this->validate(
            ['name' => ['required']],
            ['name.required' => 'School type cannot be empty']
        );

        $cat = SchoolType::findOrFail($this->cid);
        $data['slug'] = Str::slug($data['name'] . "-" . auth()->user()->current_tenant_id);
        $saved = $cat->update($data);
        if ($saved) {
            $this->reset();
            $this->alert('success', 'Data updated successfully');
            return redirectBack();
        }
    }

    function mount()
    {
        // $this->showCountry();
        $this->con = settings();
        $this->cid = $this->con?->cid;
        $this->school_country = $this->con?->school_country;
        $this->school_email = $this->con?->school_email;
        $this->school_name = $this->con?->school_name;
        $this->school_phone = $this->con?->school_phone;
    }

    public function render()
    {

        return view('livewire.settings');
    }
}