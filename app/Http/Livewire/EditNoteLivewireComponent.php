<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Note;

class EditNoteLivewireComponent extends Component
{
    public $noteid;
    public $chapter;
    public $sub_chapter;
    public $category;
    public $description;

    public function mount($noteid) {
        $page = DB::table('notes')->where('id', $noteid)->first();
        if(is_null($page)) {
            return redirect()->route('dashboard');
        }
        else {
            $this->chapter = $page->chapter;
            $this->sub_chapter = $page->subChapter;
            $this->category = $page->category;
            $this->description = $page->notes;
        }
    }

    protected $rules = [
        'chapter' => 'required|string|min:4|max:255',
        'sub_chapter' => 'nullable|max:255',
        'category' => 'required|string|min:4|max:255',
        'description' => 'required|string|min:4|max:4294967200'
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save() {
        $this->validate();

        $page = Note::find($this->noteid);

        $page->chapter = is_null($this->chapter) ? $page->chapter : $this->chapter;
        $page->subChapter = is_null($this->sub_chapter) ? $page->subChapter : $this->sub_chapter;
        $page->category = is_null($this->category) ? $page->category : $this->category;
        $page->notes = is_null($this->description) ? $page->notes : $this->description;

        $page->save();
        
        session()->flash('page-message', 'Blog Post Successfully Edited');
    }

    public function render()
    {
        return view('livewire.edit-note-livewire-component');
    }
}
