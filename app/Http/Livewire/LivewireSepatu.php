<?php

namespace App\Http\Livewire;

use App\Models\Sepatu;
use App\Models\User;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LivewireSepatu extends LivewireDatatable
{
    // public function render()
    // {
    //     return view('livewire.livewire-sepatu');
    // }

    public $nama;
    public $ukuran;
    public $user_id;
    public $model = Sepatu::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id')->defaultSort('asc'),
            Column::name('nama')->label('nama')->searchable(),
            Column::name('ukuran')->label('ukuran')->searchable(),

            Column::callback(['user_id'], function ($user_id) {
                return User::find($user_id)->name;
            })->label('User')->unsortable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.actions-sepatu', ['id' => $id]);
            })->label('Action')->unsortable()
        ];
    }
}
