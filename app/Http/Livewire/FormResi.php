<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Resi;
use App\Models\Sepatu;
use PDO;

class FormResi extends Component
{
    public $status;
    public $id_sepatu;
    public $sepatu;
    public $event;
    public $model = Resi::class;

    public function render()
    {
        return view('livewire.form-resi');
    }

    public function mount(){
        $id = request()->segment(count(request()->segments()));
        $data = $this->model::find($id);
        $this->event = null;

        if($data){
            $this->event = $data;
            $this->sepatu = Sepatu::find($data->id_sepatu)->nama;

            $this->resi = $data->resi;
            $this->status = $data->status;
            $this->id_sepatu = $data->id_sepatu;
        }
    }

    public function submit()
    {
        $this->validate([
            'status'   => 'required',
        ]);

        $data = [
            'resi'  => $this->resi,
            'status'  => $this->status,
            'id_sepatu'  => $this->id_sepatu,
        ];

        $this->model::create($data);

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');

        $this->dispatchBrowserEvent('swal', [
            'title' => "created",
            'text'  => "usercreated",
            'icon'  => 'success',
            'timer' => 3000
        ]);

        //redirect
        return redirect('/resi');
    }
}
