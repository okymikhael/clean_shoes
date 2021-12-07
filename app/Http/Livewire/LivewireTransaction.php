<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\Sepatu;
use App\Models\Resi;
use App\Models\User;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LivewireTransaction extends LivewireDatatable
{
    // public function render()
    // {
    //     return view('livewire.livewire-transactionpeminjaman');
    // }

    public $sepatu_id;
    public $resi_id;
    public $biaya;
    public $status_pembayaran;
    public $id_admin;
    public $event;
    public $model = Transaction::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id')->defaultSort('asc'),

            Column::callback(['sepatu_id'], function ($sepatu_id) {
                return Sepatu::find($sepatu_id)->nama;
            })->label('Sepatu')->unsortable(),

            // Column::callback(['resi_id'], function ($resi_id) {
            //     return Resi::find($resi_id)->name;
            // })->label('Resi')->unsortable(),
            Column::name('resi_id')->label('Resi'),


            Column::callback(['id_admin'], function ($id_admin) {
                return User::find($id_admin)->name;
            })->label('Admin')->unsortable(),

            Column::name('status_pembayaran')->label('status_pembayaran')->searchable(),
            Column::name('biaya')->label('biaya'),

            Column::callback(['id'], function ($id) {
                return view('livewire.actions-transaction', ['id' => $id]);
            })->label('Action')->unsortable()
        ];
    }
}
