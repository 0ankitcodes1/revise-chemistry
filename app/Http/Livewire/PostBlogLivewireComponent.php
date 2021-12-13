<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Blog;

class PostBlogLivewireComponent extends Component
{
    use WithFileUploads;
    public $title = 'Write Your Catchy Blog Title';
    public $category;
    public $file;
    public $description = 'Write Some Description About Your Blog';

    protected $rules = [
        'title' => 'required|min:4|max:255',
        'category' => 'required|min:4|max:255',
        'file' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        'description' => 'required|min:4|max:4294967200'
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }


    public function save() {
        $validateData = $this->validate();

        $path = $this->file->store('images', 'custom');
        $path = route('home').'/resources'.'/'.$path;

        Blog::create([
            'title' => $this->title,
            'category' => $this->category,
            'thumbnail' => $path,
            'description' => $this->description
        ]);

        session()->flash('page-message', 'New Blog Post Added Successfully');
    }

    public function render()
    {
        return view('livewire.post-blog-livewire-component');
    }
}
