<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Guru;
use PDO;

class FormGuru extends Component
{
    public $nip;
    public $nama;
    public $jenis_ptk;
    public $wali_kelas;
    public $event;
    public $model = Guru::class;

    public function render()
    {
        return view('livewire.form-guru');
    }

    public function mount(){
        $id = request()->segment(count(request()->segments()));
        $data = $this->model::find($id);
        $this->event = null;

        if($data){
            $this->event = $data;

            $this->nip = $data->nip ;
            $this->nama = $data->nama;
            $this->jenis_ptk = $data->jenis_ptk;
            $this->wali_kelas = $data->wali_kelas;
        }
    }

    public function submit()
    {
        $this->validate([
            'nip'   => 'required',
            'nama' => 'required',
            'jenis_ptk' => 'required',
            'wali_kelas' => 'required',
        ]);

        $data = [
            'nip'  => $this->nip,
            'nama'  => $this->nama,
            'jenis_ptk' => $this->jenis_ptk,
            'wali_kelas'  => $this->wali_kelas,
        ];

        if($this->event){
            $this->model::find($this->event->id)->update($data);
        }else{
            $this->model::create($data);
        }

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');

        $this->dispatchBrowserEvent('swal', [
            'title' => "created",
            'text'  => "usercreated",
            'icon'  => 'success',
            'timer' => 3000
        ]);

        //redirect
        return redirect('/teacher');
    }
}
