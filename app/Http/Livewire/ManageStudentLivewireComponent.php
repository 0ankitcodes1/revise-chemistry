<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Student;

class ManageStudentLivewireComponent extends Component
{
    use WithPagination;

    public $search;
    public $what_search = 'id';

    protected $queryString = [
        'search' => ['except'=> ''],
    ];

    public function updatedSearch() {
        $this->resetPage();
    }

    public function delete($id) {
        DB::table('students')->where('id', $id)->delete();
        session()->flash('page-message', 'Student Record Successfully Deleted.');
        $this->mount();
        $this->render();
    }

    public function render()
    {
        $search = '%'.$this->search.'%';
        return view('livewire.manage-student-livewire-component', [
            'pageArray' => Student::where($this->what_search, 'like', $search)
            ->orderBy('created_at', 'Desc')
            ->paginate(10),
        ]);
    }
}
