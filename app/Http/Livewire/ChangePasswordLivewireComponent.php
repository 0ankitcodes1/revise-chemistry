<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Student;

class ChangePasswordLivewireComponent extends Component
{
    public $userrole;
    public $userid;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'password' => 'required|min:6|max:255|confirmed'
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save() {
        $validateData = $this->validate();

        if ($this->userrole == 0) {
            // for admin
            $page = Admin::find($this->userid);

            $page->password = Hash::make($this->password);
    
            $page->save();
    
            session()->flash('page-message', 'Password Successfully Changed');
        }
        else {
            // for other student
            $page = Student::find($this->userid);

            $page->password = Hash::make($this->password);
    
            $page->save();
    
            session()->flash('page-message', 'Password Successfully Changed');
        }
    }

    public function render()
    {
        return view('livewire.change-password-livewire-component');
    }
}
