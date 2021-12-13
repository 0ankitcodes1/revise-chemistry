<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\ChapterVideo;

class VideoForm extends Component
{
    use WithFileUploads;
 
    public $token;
    public $video_chapter;
    public $video_category;
    public $video_subchapter;
    public $photo;
 
    protected $rules = [
        'video_chapter' => 'required|min:6|max:255',
        'video_category' => 'required|min:1|max:255',
        'video_subchapter' => 'required|min:6|max:255',
        'photo' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm|max:102400', // 12MB Max
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }


    public function save()
    {
        $this->validate();

        $path = $this->photo->store('videos');
        $path = route('home').'/resources/videos/'.$this->photo->getFileName();

        ChapterVideo::Create([
            'chapter' => $this->video_chapter,
            'subChapter' => $this->video_subchapter,
            'category' => $this->video_category,
            'mediaType' => $this->photo->getMimeType(),
            'videoUrl' => $path
        ]);

        session()->flash('upload-video-message', 'Video successfully uploaded.');
    }

    public function render()
    {
        return view('livewire.video-form');
    }
}
