<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Quiz;

class ManageMcqLivewireComponent extends Component
{
    use WithPagination;

    public $search;
    public $what_search = 'question';

    protected $queryString = [
        'search' => ['except'=> ''],
    ];

    public function updatedSearch() {
        $this->resetPage();
    }

    public function delete($id) {
        DB::table('quizzes')->where('id', $id)->delete();
        session()->flash('page-message', 'Question Successfully Deleted.');
        $this->mount();
        $this->render();
    }

    public function render()
    {
        $search = '%'.$this->search.'%';
        return view('livewire.manage-mcq-livewire-component', [
            'pageArray' => Quiz::where($this->what_search, 'like', $search)
            ->orderBy('created_at', 'Desc')
            ->paginate(10),
        ]);
    }
}
