<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class EditBlogPostLivewireComponent extends Component
{
    use WithFileUploads;

    public $postid;
    public $title;
    public $thumbnail;
    public $file;
    public $category;
    public $description;

    public function mount($postid) {
        $page = DB::table('blogs')->where('id', $postid)->first();
        if (is_null($page)) {
            return redirect()->route('dashboard');
        }
        else {
            $this->title = $page->title;
            $this->thumbnail = $page->thumbnail;
            $this->category = $page->category;
            $this->description = $page->description;
        }
    }

    protected $rules = [
        'title' => 'required|min:4|max:255',
        'category' => 'required|min:4|max:255',
        'file' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000',
        'description' => 'required|min:4|max:4294967200'
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $page = Blog::find($this->postid);

        $page->title = is_null($this->title) ? $page->title : $this->title;
        $page->category = is_null($this->category) ? $page->category : $this->category;
        $page->description = is_null($this->description) ? $page->description : $this->description;

        if(!is_null($this->file)) {
            $path = $this->file->store('images', 'custom');
            $path = route('home').'/resources'.'/'.$path;
            $page->thumbnail = $path; 
        }

        $page->save();
        
        session()->flash('page-message', 'Blog Post Successfully Edited');
    }
    
    public function render()
    {
        return view('livewire.edit-blog-post-livewire-component');
    }
}
