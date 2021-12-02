<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use PDO;

class FormBook extends Component
{
    public $judul;
    public $pengarang;
    public $tahun;
    public $jenis;
    public $jumlah;
    public $event;
    public $model = Book::class;

    public function render()
    {
        return view('livewire.form-book');
    }

    public function mount(){
        $id = request()->segment(count(request()->segments()));
        $data = $this->model::find($id);
        $this->event = null;

        if($data){
            $this->event = $data;

            $this->judul = $data->judul ;
            $this->pengarang = $data->pengarang;
            $this->tahun = $data->tahun;
            $this->jenis = $data->jenis;
            $this->jumlah = $data->jumlah;
        }
    }

    public function submit()
    {
        $this->validate([
            'judul'   => 'required',
            'pengarang' => 'required',
            'tahun' => 'required',
            'jenis' => 'required',
            'jumlah' => 'required',
        ]);

        $data = [
            'judul'  => $this->judul,
            'pengarang'  => $this->pengarang,
            'tahun' => $this->tahun,
            'jenis'  => $this->jenis,
            'jumlah'  => $this->jumlah,
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
        return redirect('/book');
    }
}
