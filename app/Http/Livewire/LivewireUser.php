<?php

namespace App\Http\Livewire;

// use Livewire\Component;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;


class LivewireUser extends LivewireDatatable
{
    // public function render()
    // {
    //     return view('livewire.livewire-student');
    // }

    public $name;
    public $email;
    public $event;
    public $model = User::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id')->defaultSort('asc'),
            Column::name('name')->label('name')->searchable(),
            Column::name('email')->label('email')->searchable(),


            // Column::name('name')->filterable()->searchable(),

            // Column::name('email')->truncate()->filterable()->searchable(),

            // DateColumn::name('created_at')->filterable(),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('livewire.actions-user', ['id' => $id, 'name' => $name]);
            })->label('Action')->unsortable()
        ];
    }
}
