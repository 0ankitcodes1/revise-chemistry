<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DisplayVideo extends Component
{
    public $allVideo;

    public function deleteRecord($id) {
        DB::table('chapter_videos')->where('id', $id)->delete();
        session()->flash('video-deleted', 'Video Successfully Deleted.');
        $this->mount();
        $this->render();
    }

    public function mount() {
        $this->allVideo = DB::table('chapter_videos')->get();
    }

    public function render()
    {
        return view('livewire.display-video');
    }
}
