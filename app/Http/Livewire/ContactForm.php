<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $contact;
    public $subject;
    public $message;

    protected $rules = [
        'name' => 'required|min:6|max:255',
        'email' => 'required|email|max:255',
        'contact' => 'nullable|max:255',
        'subject' => 'required|min:6|max:255',
        'message' => 'required|min:6|max:255',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validatedData = $this->validate();
        Contact::create([
            'full_name' => $this->name,
            'email' => $this->email,
            'contact_number' => $this->contact,
            'subject' => $this->subject,
            'message' => $this->message
        ]);

        session()->flash('message', 'Contact Form Successfully Submitted');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
