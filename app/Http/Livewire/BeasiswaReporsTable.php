<?php

namespace App\Http\Livewire;

use App\Models\beasiswa_report;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use PowerComponents\LivewirePowerGrid\Column;

class BeasiswaReporsTable extends Component
{
    public function columns(): array
    {
        return [
            Column::make('nominal', 'Nominal')->searchable()->sortable(),
            Column::make('status', 'Status')->searchable()->sortable()
        ];
    }

    public function query(): Builder
    {
        return beasiswa_report::query();
    }

    public function render()
    {
        return view('livewire.beasiswa-repors-table');
    }
}
