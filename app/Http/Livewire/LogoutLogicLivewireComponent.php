<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LogoutLogicLivewireComponent extends Component
{
    public $userrole;
    public $useremail;

    public function save() {
        if($this->userrole == 0) {
            setcookie('admin_token', '', time() - (86400 * 30 * 10 * 10), "/");
            return redirect()->route('studentlogin');
        }
        else {
            setcookie('student_token', '', time() - (86400 * 30 * 10 * 10), "/");
            return redirect()->route('adminlogin');
        }
    }
    
    public function render()
    {
        return view('livewire.logout-logic-livewire-component');
    }
}
