<?php

namespace App\Http\Livewire;

// use Livewire\Component;
use Spatie\Permission\Models\Role;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;


class LivewireRoles extends LivewireDatatable
{
    // public function render()
    // {
    //     return view('livewire.livewire-roles');
    // }

    public $name;
    public $guard_name;
    public $model = Role::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id')->defaultSort('asc'),
            Column::name('name')->label('Nama')->searchable(),
            Column::name('guard_name')->label('Guard')->searchable(),

            // Column::name('name')->filterable()->searchable(),

            // Column::name('email')->truncate()->filterable()->searchable(),

            // DateColumn::name('created_at')->filterable(),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('livewire.actions-roles', ['id' => $id, 'name' => $name]);
            })->label('Action')->unsortable()
        ];
    }
}
