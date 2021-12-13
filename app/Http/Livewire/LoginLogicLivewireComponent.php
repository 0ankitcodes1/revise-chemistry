<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\Student;
use App\Models\Admin;

class LoginLogicLivewireComponent extends Component
{
    public $userrole;
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email|max:255',
        'password' => 'required|max:255'
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save() {
        $validateData = $this->validate();

        if ($this->userrole == 0) {
            // admin authentication logic
            $admin = Admin::where('email', $this->email);
            if ($admin->exists()) {
                if (Hash::check($this->password, $admin->first()->password)) {
                    setcookie('admin_token', $admin->first()->token, time() + (86400 * 30 * 10), "/");
                    return redirect()->route('dashboard');
                    session()->flash('page-message', 'Cookie successfully set');
                }
                else {
                    session()->flash('warning-message', 'Email or password did not match');
                }
            }
            else {
                session()->flash('warning-message', 'Email Address Not Found');
            }
        }
        else {
            // student authentication logic
            $student = Student::where('email', $this->email);
            if ($student->exists()) {
                if (Hash::check($this->password, $student->first()->password)) {
                    setcookie('student_token', $student->first()->token, time() + (86400 * 30 * 10), "/");
                    return redirect()->route('studentdashboard');
                    session()->flash('page-message', 'Cookie successfully set');
                }
                else {
                    session()->flash('warning-message', 'Email or password did not match');
                }
            }
            else {
                session()->flash('warning-message', 'Email Address Not Found');
            }
        }
    }

    public function render()
    {
        return view('livewire.login-logic-livewire-component');
    }
}
