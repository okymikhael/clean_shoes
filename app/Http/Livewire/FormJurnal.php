<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Jurnal;
use PDO;

class FormJurnal extends Component
{
    use WithFileUploads;

    public $judul;
    public $file;
    public $admin;
    public $event;
    public $model = Jurnal::class;

    public function render()
    {
        return view('livewire.form-jurnal');
    }

    public function mount(){
        $id = request()->segment(count(request()->segments()));
        $data = $this->model::find($id);
        $this->event = null;

        if($data){
            $this->event = $data;

            $this->judul = $data->judul ;
            $this->file = $data->file;
            $this->admin = $data->admin;
        }
    }

    public function updated($name, $value)
    {
        if($name == 'file'){
            $this->validate([
                'file' => 'required|mimes:pdf',
            ]);
        }
    }

    public function submit()
    {
        $this->validate([
            'judul'   => 'required',
        ]);

        $data = [
            'judul'  => $this->judul,
            'file'  => gettype($this->file) == 'string' ? $this->file : $this->file->storeAs('public/jurnal', $this->file->getClientOriginalName()),
        ];

        if($this->event){
            $this->model::find($this->event->id)->update($data);
        }else{
            $data['admin'] = \Auth::user()->name;
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
        return redirect('/jurnal');
    }
}
