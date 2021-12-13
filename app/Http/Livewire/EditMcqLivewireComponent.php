<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Quiz;

class EditMcqLivewireComponent extends Component
{
    public $mcqid;
    public $question;
    public $option1;
    public $option2;
    public $option3;
    public $option4;
    public $category;
    public $chapter;
    public $subChapter;
    public $answer;
    public $description;
    public $optionArray;

    public function mount($mcqid) {
        $page = DB::table('quizzes')->where('id', $mcqid)->first();
        if (is_null($page)) {
            return redirect()->route('dashboard');
        }
        else {
            $this->question = $page->question;
            // lets decode the options here
            $optionArray = json_decode($page->options);
            $this->option1 = $optionArray[0];
            $this->option2 = $optionArray[1];
            $this->option3 = $optionArray[2];
            $this->option4 = $optionArray[3];

            $this->category = $page->category;
            $this->chapter = $page->chapter;
            $this->subChapter = $page->subChapter;
            $this->answer = $page->answer;
            $this->description = $page->description;
        }
    }

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

    public function save()
    {
        $this->validate();

        $page = Quiz::find($this->mcqid);

        $page->question = is_null($this->question) ? $page->question : $this->question;

        $this->optionArray = array($this->option1, $this->option2, $this->option3, $this->option4);

        $page->options = is_null($this->option1 && $this->option2 && $this->option3 && $this->option4) ? $page->options : json_encode($this->optionArray);

        $page->category = is_null($this->category) ? $page->category : $this->category;
        $page->chapter = is_null($this->chapter) ? $page->chapter : $this->chapter;
        $page->subChapter = is_null($this->subChapter) ? $page->subChapter : $this->subChapter;
        $page->description = is_null($this->description) ? $page->description : $this->description;
        $page->answer = is_null($this->answer) ? $page->answer : $this->answer;
        $page->save();
        
        session()->flash('page-message', 'Question Successfully Edited');
    }

    public function render()
    {
        return view('livewire.edit-mcq-livewire-component');
    }
}
