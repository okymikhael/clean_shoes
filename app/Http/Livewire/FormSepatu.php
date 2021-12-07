<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sepatu;
use App\Models\User;
use PDO;

class FormSepatu extends Component
{
    public $nama;
    public $ukuran;
    public $user_id;
    public $user;
    public $event;
    public $model = Sepatu::class;

    public function render()
    {
        return view('livewire.form-sepatu');
    }

    public function mount(){
        $id = request()->segment(count(request()->segments()));
        $data = $this->model::find($id);
        $this->event = null;
        $this->user = User::all();

        if($data){
            $this->event = $data;

            $this->nama = $data->nama ;
            $this->ukuran = $data->ukuran;
            $this->user_id = $data->user_id;
            $this->user = User::where('id', $data->user_id)->get();
        }
    }

    public function submit()
    {
        $this->validate([
            'nama'   => 'required',
            'ukuran' => 'required',
            'user_id' => 'required',
        ]);

        $data = [
            'nama'  => $this->nama,
            'ukuran'  => $this->ukuran,
            'user_id' => $this->user_id,
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
        return redirect('/sepatu');
    }
}
