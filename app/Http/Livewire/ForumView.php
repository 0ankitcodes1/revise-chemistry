<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ForumView extends Component
{
    public $allReplies;
    public $allUsers;

    protected $listeners = ['updateForumView' => 'updateForForum'];

    public function updateForForum() {
        $this->mount();
        $this->render();
    }

    public function mount() {
        $this->allReplies = DB::table('forums')->orderByDesc('created_at')->get();
        $this->allUsers = DB::table('students')->get();
    }
    
    public function render()
    {
        return view('livewire.forum-view');
    }
}
