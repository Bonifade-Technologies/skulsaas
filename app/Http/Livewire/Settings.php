<?php

namespace App\Http\Livewire;

use App\Models\SchoolType;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Http;
use Livewire\WithFileUploads;

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
                'school_phone' => 'required|digits:10|unique:settings,school_phone,' . $this->con->id,
                'school_email' => 'required|email|unique:settings,school_email,' . $this->con->id
            ],
            [
                'school_phone.unique' => 'phone number already exist',
                'school_phone.digits' => 'phone number must be 10 digits number',
                'school_email.unique' => 'email number already exist'
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


    function uploadSchoolLogo()
    {
        $this->con->addMedia($this->school_logo->getRealPath())
            ->usingName($this->school_logo->getClientOriginalName())
            ->toMediaCollection('setting');
    }
    function saveSchoolName()
    {
        $data = $this->validate(
            ['name' => 'required|unique:school_types,name'],
            ['name.unique' => 'School type already exist']
        );

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
            ['name' => 'required|unique:school_types,name,' . $this->cid],
            ['name.required' => 'School type cannot be empty']
        );

        $cat = SchoolType::findOrFail($this->cid);

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
        $this->school_country = $this->con->school_country;
        $this->school_email = $this->con->school_email;
        $this->school_name = $this->con->school_name;
        $this->school_phone = $this->con->school_phone;
    }
    public function render()
    {

        return view('livewire.settings');
    }
}