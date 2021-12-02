<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Siswa;
use PDO;

class FormSiswa extends Component
{
    public $nisn;
    public $name;
    public $address;
    public $gender;
    public $class;
    public $event;
    public $model = Siswa::class;

    public function render()
    {
        return view('livewire.form-siswa');
    }

    public function mount(){
        $id = request()->segment(count(request()->segments()));
        $data = $this->model::find($id);
        $this->event = null;

        if($data){
            $this->event = $data;

            $this->nisn = $data->nisn;
            $this->name = $data->name;
            $this->address = $data->address;
            $this->gender = $data->gender;
            $this->class = $data->class;
        }
    }

    public function submit()
    {
        $this->validate([
            'nisn'   => 'required',
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'class' => 'required',
        ]);

        $data = [
            'nisn'      => $this->nisn,
            'name'      => $this->name,
            'address'   => $this->address,
            'gender'    => $this->gender,
            'class'    => $this->class,
        ];

        if($this->event){
            $this->model::find($this->event->id)->update($data);
        }else{
            $this->model::create($data);
        }

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');

        $this->dispatchBrowserEvent('swal', [
            'title'     => "created",
            'text' => "usercreated",
            'icon' => 'success',
            'timer' => 3000
        ]);

        //redirect
        return redirect('/student');
    }
}
