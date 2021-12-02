<?php

namespace App\Http\Livewire;

// use Livewire\Component;
use App\Models\Siswa;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;


class LivewireStudent extends LivewireDatatable
{
    // public function render()
    // {
    //     return view('livewire.livewire-student');
    // }

    public $nisn;
    public $name;
    public $class;
    public $address;
    public $gender;
    public $model = Siswa::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id')->defaultSort('asc'),
            Column::name('nisn')->label('NISN')->searchable(),
            Column::name('name')->label('Nama')->searchable(),
            Column::name('class')->label('Kelas')->searchable(),
            Column::name('address')->label('Alamat')->searchable(),
            Column::callback(['gender'], function ($gender) {
                return $gender == "f"
                ? 'Wanita'
                : 'Pria';
            })->label('Jenis Kelamin'),

            // Column::name('name')->filterable()->searchable(),

            // Column::name('email')->truncate()->filterable()->searchable(),

            // DateColumn::name('created_at')->filterable(),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('livewire.actions-siswa', ['id' => $id, 'name' => $name]);
            })->label('Action')->unsortable()
        ];
    }
}
