<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\StudentReport;

class ManageStudentReportLivewireComponent extends Component
{
    use WithPagination;

    public $search;
    public $what_search = 'user_id';

    protected $queryString = [
        'search' => ['except'=> ''],
    ];

    public function updatedSearch() {
        $this->resetPage();
    }

    public function delete($id) {
        DB::table('student_reports')->where('id', $id)->delete();
        session()->flash('page-message', 'Student Report Successfully Deleted.');
        $this->mount();
        $this->render();
    }

    public function render()
    {
        $search = '%'.$this->search.'%';
        return view('livewire.manage-student-report-livewire-component', [
            'pageArray' => StudentReport::where($this->what_search, 'like', $search)
            ->orderBy('created_at', 'Desc')
            ->paginate(10),
        ]);
    }
}
