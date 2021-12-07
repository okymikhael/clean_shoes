<?php

namespace App\Http\Livewire;

use App\Models\Resi;
use App\Models\Sepatu;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LivewireResi extends LivewireDatatable
{
    // public function render()
    // {
    //     return view('livewire.livewire-resi');
    // }

    public $status;
    public $id_sepatu;
    public $model = Resi::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id')->defaultSort('asc'),
            Column::name('resi')->label('Resi')->searchable(),
            Column::name('status')->label('status')->searchable(),
            
            Column::callback(['id_sepatu'], function ($id_sepatu) {
                return Sepatu::find($id_sepatu)->nama;
            })->label('Sepatu')->unsortable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.actions-resi', ['id' => $id]);
            })->label('Action')->unsortable()
        ];
    }
}
