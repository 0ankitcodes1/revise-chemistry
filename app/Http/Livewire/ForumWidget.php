<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Forum;
use Illuminate\Support\Facades\DB;

class ForumWidget extends Component
{
    public $reply_msg;
    public $token;
 
    protected $rules = [
        'reply_msg' => 'required|min:6|max:100000',
    ];
 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
 
    public function saveContact()
    {
        $this->validate();
        $getUser = DB::table('students')->where('token', $this->token)->first();
        if ($getUser) {
            Forum::create([
                'user_id' => $getUser->id,
                'reply' => $this->reply_msg,
            ]);
            $this->emit('updateForumView');
        }
    }

    public function render()
    {
        return view('livewire.forum-widget');
    }
}
