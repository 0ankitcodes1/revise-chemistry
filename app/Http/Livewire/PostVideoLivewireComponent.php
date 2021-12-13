<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\ChapterVideo;

class PostVideoLivewireComponent extends Component
{
    use WithFileUploads;
 
    public $video_chapter;
    public $video_category;
    public $video_subchapter;
    public $video;

    protected $rules = [
        'video_chapter' => 'required|min:6|max:255',
        'video_category' => 'required|min:1|max:255',
        'video_subchapter' => 'nullable|min:6|max:255',
        'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm|max:1024000', // 120MB Max
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }


    public function save()
    {
        $this->validate();

        $path = $this->video->store('videos', 'custom');
        $path = route('home').'/resources'.'/'.$path;

        ChapterVideo::Create([
            'chapter' => $this->video_chapter,
            'subChapter' => $this->video_subchapter,
            'category' => $this->video_category,
            'mediaType' => $this->video->getMimeType(),
            'videoUrl' => $path
        ]);

        session()->flash('upload-video-message', 'Video successfully uploaded.');
    }

    public function render()
    {
        return view('livewire.post-video-livewire-component');
    }
}
