<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LivewireBook extends LivewireDatatable
{
    // public function render()
    // {
    //     return view('livewire.livewire-book');
    // }

    public $judul;
    public $pengarang;
    public $tahun;
    public $jenis;
    public $jumlah;
    public $model = Book::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id')->defaultSort('asc'),
            Column::name('judul')->label('Judul')->searchable(),
            Column::name('pengarang')->label('Pengarang')->searchable(),
            Column::name('tahun')->label('Tahun')->searchable(),
            Column::name('jenis')->label('Jenis')->searchable(),
            Column::name('jumlah')->label('jumlah'),

            // Column::name('name')->filterable()->searchable(),

            // Column::name('email')->truncate()->filterable()->searchable(),

            // DateColumn::name('created_at')->filterable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.actions-book', ['id' => $id]);
            })->label('Action')->unsortable()
        ];
    }
}
