<?php

namespace App\Http\Livewire;

use App\Models\Aktifitas;
use App\Models\Book;
use App\Models\Siswa;
use App\Models\User;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LivewireAktifitas extends LivewireDatatable
{
    // public function render()
    // {
    //     return view('livewire.livewire-aktifitaspeminjaman');
    // }

    public $id_buku;
    public $id_siswa;
    public $id_admin;
    public $status;
    public $tenggat_waktu;
    public $event;
    public $model = Aktifitas::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id')->defaultSort('asc'),
            // Column::name('id_buku')->label('id_buku')->searchable(),

            Column::callback(['id_buku'], function ($id_buku) {
                return Book::find($id_buku)->judul;
            })->label('Judul')->unsortable()->searchable(),

            // Column::name('id_siswa')->label('id_siswa')->searchable(),

            Column::callback(['id_siswa'], function ($id_siswa) {
                return Siswa::find($id_siswa)->name;
            })->label('Nama')->unsortable(),

            // Column::name('id_admin')->label('id_admin')->searchable(),

            Column::callback(['id_admin'], function ($id_admin) {
                return User::find($id_admin)->name;
            })->label('Admin')->unsortable(),

            Column::name('status')->label('status')->searchable(),
            Column::name('tenggat_waktu')->label('tenggat_waktu'),


            // Column::name('name')->filterable()->searchable(),

            // Column::name('email')->truncate()->filterable()->searchable(),

            // DateColumn::name('created_at')->filterable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.actions-aktifitas', ['id' => $id]);
            })->label('Action')->unsortable()
        ];
    }
}
