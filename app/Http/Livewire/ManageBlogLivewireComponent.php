<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\Blog;

class ManageBlogLivewireComponent extends Component
{
    use WithPagination;

    public $search;
    public $what_search = 'title';

    protected $queryString = [
        'search' => ['except'=> ''],
    ];

    public function updatedSearch() {
        $this->resetPage();
    }

    public function delete($id) {
        DB::table('blogs')->where('id', $id)->delete();
        session()->flash('page-message', 'Blog Post Successfully Deleted.');
        $this->mount();
        $this->render();
    }

    public function render()
    {
        $search = '%'.$this->search.'%';
        return view('livewire.manage-blog-livewire-component', [
            'pageArray' => Blog::where($this->what_search, 'like', $search)
            ->orderBy('created_at', 'Desc')
            ->paginate(10),
        ]);
    }
}
