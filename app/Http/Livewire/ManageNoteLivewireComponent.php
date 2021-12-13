<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Note;

class ManageNoteLivewireComponent extends Component
{
    use WithPagination;

    public $search;
    public $what_search = 'chapter';

    protected $queryString = [
        'search' => ['except'=> ''],
    ];

    public function updatedSearch() {
        $this->resetPage();
    }

    public function delete($id) {
        DB::table('notes')->where('id', $id)->delete();
        session()->flash('page-message', 'Note Successfully Deleted.');
        $this->mount();
        $this->render();
    }

    public function render()
    {
        $search = '%'.$this->search.'%';
        return view('livewire.manage-note-livewire-component', [
            'pageArray' => Note::where($this->what_search, 'like', $search)
            ->orderBy('created_at', 'Desc')
            ->paginate(10),
        ]);
    }
}
