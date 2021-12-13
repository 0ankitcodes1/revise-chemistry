<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\ChapterVideo;

class EditVideoLivewireComponent extends Component
{
    use WithFileUploads;

    public $videoid;
    public $video_chapter;
    public $video_category;
    public $video_subchapter;
    public $videoUrl;
    public $mediaVideoType;
    public $video;

    public function mount($videoid) {
        $page = DB::table('chapter_videos')->where('id', $videoid)->first();
        if (is_null($page)) {
            return redirect()->route('dashboard');
        }
        else {
            $this->video_chapter = $page->chapter;
            $this->video_category = $page->category;
            $this->video_subchapter = $page->subChapter;
            $this->videoUrl = $page->videoUrl;
            $this->mediaVideoType = $page->mediaType;
        }
    }

    protected $rules = [
        'video_chapter' => 'required|min:6|max:255',
        'video_category' => 'required|min:1|max:255',
        'video_subchapter' => 'nullable|min:6|max:255',
        'video' => 'nullable|mimes:mp4,ogx,oga,ogv,ogg,webm|max:1024000', // 120MB Max
    ];


    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $page = ChapterVideo::find($this->videoid);

        $page->chapter = is_null($this->video_chapter) ? $page->chapter : $this->video_chapter;
        $page->subChapter = is_null($this->video_subchapter) ? $page->subChapter : $this->video_subchapter;
        $page->category = is_null($this->video_category) ? $page->category : $this->video_category;

        if(!is_null($this->video)) {
            $path = $this->video->store('videos', 'custom');
            $path = route('home').'/resources'.'/'.$path;
            $page->videoUrl = $path;
            $page->videoUrl = $this->video->getMimeType();  
        }

        $page->save();
        
        session()->flash('page-message', 'Chapter video Successfully Edited');
    }

    public function render()
    {
        return view('livewire.edit-video-livewire-component');
    }
}
