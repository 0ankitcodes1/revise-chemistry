<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Contact;

class DisplayContact extends Component
{
    public $search;

    use WithPagination;

    public function delete($id) {
        DB::table('news')->where('id', $id)->delete();
        session()->flash('delete-news-message', 'Contact successfully deleted.');
        $this->mount();
        $this->render();
    }

    public function render()
    {
        $search = '%'.$this->search.'%';
        return view('livewire.display-contact', [
            'newsArray' => Contact::where('full_name', 'like', $search)->paginate(100),
        ]);
    }
}
