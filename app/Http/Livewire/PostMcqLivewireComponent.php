<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Quiz;

class PostMcqLivewireComponent extends Component
{
    public $question = 'Write down your question';
    public $option1;
    public $option2;
    public $option3;
    public $option4;
    public $category;
    public $chapter = 'Chapter name';
    public $subChapter;
    public $answer;
    public $description = 'Write something about your answer';
    public $optionArray;

    protected $rules = [
        'question' => 'required|string|min:3|max:200000',
        'option1' => 'required|string|max:255',
        'option2' => 'required|string|max:255',
        'option3' => 'required|string|max:255',
        'option4' => 'required|string|max:255',
        'category' => 'required|string|min:3|max:255',
        'answer' => 'required|string|max:255',
        'chapter' => 'required|string|min:5|max:255',
        'subChapter' => 'nullable|string|max:255',
        'description' => 'required|string|max:2000',
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save() {
        $validateData = $this->validate();
        $this->optionArray = array($this->option1, $this->option2, $this->option3, $this->option4);
        Quiz::create([
            'question' => $this->question,
            'options' => json_encode($this->optionArray),
            'answer' => $this->answer,
            'description' => $this->description,
            'chapter' => $this->chapter,
            'subChapter' => $this->subChapter,
            'category' => $this->category,
        ]);
        session()->flash('page-message', 'Your question has been successfully added');
    }

    public function render()
    {
        return view('livewire.post-mcq-livewire-component');
    }
}
