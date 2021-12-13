<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\StudentReport;

class McqReportLivewireComponent extends Component
{
    public $userrole;
    public $userid;

    public function render()
    {
        $report = StudentReport::where('user_id', $this->userid)->get();
        return view('livewire.mcq-report-livewire-component', [
            'pageArray' => $report
        ]);
    }
}
