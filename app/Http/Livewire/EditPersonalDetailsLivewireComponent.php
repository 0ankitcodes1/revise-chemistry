<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Admin;
use App\Models\Student;

class EditPersonalDetailsLivewireComponent extends Component
{
    public $userid;
    public $userrole;

    public $first_name;
    public $last_name;

    protected $rules = [
        'first_name' => 'required|string|min:2|max:255',
        'last_name' => 'required|string|min:2|max:255'
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save() {
        $validateData = $this->validate();
        if ($this->userrole == 0) {
            // for admin
            $page = Admin::find($this->userid);
            $page->first_name = $this->first_name;
            $page->last_name = $this->last_name;
            $page->save();
            session()->flash('page-message', 'Admin Personal Details Successfully Changed');
        }
        else {
            // for other students
            $page = Student::find($this->userid);
            $page->first_name = $this->first_name;
            $page->last_name = $this->last_name;
            $page->save();
            session()->flash('page-message', 'Student Personal Details Successfully Changed');
        }
    }

    public function render()
    {
        return view('livewire.edit-personal-details-livewire-component');
    }
}
