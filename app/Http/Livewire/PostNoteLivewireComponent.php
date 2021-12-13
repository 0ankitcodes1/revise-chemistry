<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Note;

class PostNoteLivewireComponent extends Component
{
    public $chapter = 'Write Chapter Name';
    public $sub_chapter;
    public $category;
    public $description = 'Provide Chapter Content';

    protected $rules = [
        'chapter' => 'required|unique:notes,chapter|string|min:4|max:255',
        'sub_chapter' => 'nullable|max:255',
        'category' => 'required|string|min:4|max:255',
        'description' => 'required|string|min:4|max:4294967200'
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save() {
        $validateData = $this->validate();

        Note::create([
            'chapter' => $this->chapter,
            'subChapter' => $this->sub_chapter,
            'notes' => $this->description,
            'category' => $this->category,
        ]);

        session()->flash('page-message', 'Note Successfully Added');
    }

    public function render()
    {
        return view('livewire.post-note-livewire-component');
    }
}
