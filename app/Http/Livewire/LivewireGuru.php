<?php

namespace App\Http\Livewire;

use App\Models\Guru;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LivewireGuru extends LivewireDatatable
{
    // public function render()
    // {
    //     return view('livewire.livewire-guru');
    // }

    public $nip;
    public $nama;
    public $jenis_ptk;
    public $wali_kelas;
    public $model = Guru::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id')->defaultSort('asc'),
            Column::name('nip')->label('nip')->searchable(),
            Column::name('nama')->label('nama')->searchable(),
            Column::name('jenis_ptk')->label('jenis_ptk')->searchable(),
            Column::name('wali_kelas')->label('wali_kelas')->searchable(),

            // Column::name('name')->filterable()->searchable(),

            // Column::name('email')->truncate()->filterable()->searchable(),

            // DateColumn::name('created_at')->filterable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.actions-guru', ['id' => $id]);
            })->label('Action')->unsortable()
        ];
    }
}
