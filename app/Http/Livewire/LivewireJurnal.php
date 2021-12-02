<?php

namespace App\Http\Livewire;

use App\Models\Jurnal;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LivewireJurnal extends LivewireDatatable
{
    // public function render()
    // {
    //     return view('livewire.livewire-book');
    // }

    public $judul;
    public $file;
    public $admin;
    public $model = Jurnal::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id')->defaultSort('asc'),
            Column::name('judul')->label('Judul')->searchable(),
            Column::name('admin')->label('Admin')->searchable(),

            // Column::name('name')->filterable()->searchable(),

            // Column::name('email')->truncate()->filterable()->searchable(),

            // DateColumn::name('created_at')->filterable(),

            Column::callback(['id', 'file'], function ($id, $file) {
                return view('livewire.actions-jurnal', ['id' => $id, 'file' => $file]);
            })->label('Action')->unsortable()
        ];
    }
}
