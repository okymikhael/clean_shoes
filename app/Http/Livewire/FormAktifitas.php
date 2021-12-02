<?php

namespace App\Http\Livewire;
// use App\Models\Book;
// use App\Models\Siswa;
// use App\Models\User;
use Livewire\Component;
use App\Models\Transaction;
use PDO;

class FormTransaction extends Component
{
    // public $id_buku;
    // public $book;
    // public $siswa;
    // public $id_siswa;
    // public $id_admin;
    // public $status;
    // public $tenggat_waktu;
    public $event;
    public $model = Transaction::class;

    public function render()
    {
        return view('livewire.form-transaction');
    }

    public function mount(){
        $id = request()->segment(count(request()->segments()));
        $data = $this->model::find($id);
        $this->event = null;

        if($data){
            $this->event = $data;

            // $this->id_buku = $data->id_buku;
            // $this->id_siswa = $data->id_siswa;
            // $this->id_admin = $data->id_admin;
            // $this->status = $data->status;
            // $this->tenggat_waktu = $data->tenggat_waktu;
        }
    }

    public function submit()
    {
        // $this->validate([
        //     'id_buku'   => 'required',
        //     'id_siswa' => 'required',
        //     'status' => 'required',
        //     'tenggat_waktu' => 'required',
        // ]);

        // $data = [
        //     'id_buku'  => $this->id_buku,
        //     'id_siswa'  => $this->id_siswa,
        //     'id_admin' => \Auth::user()->id,
        //     'status'  => $this->status,
        //     'tenggat_waktu'  => $this->tenggat_waktu,
        // ];

        // if($this->event){
        //     $book = Book::find($this->id_buku);
        //     $book->jumlah = $book->jumlah + 1;
        //     $book->save();

        //     $this->model::find($this->event->id)->update($data);
        // }else{
        //     $book = Book::find($this->id_buku);
        //     $book->jumlah = $book->jumlah - 1;
        //     $book->save();

        //     $this->model::create($data);
        // }

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');

        $this->dispatchBrowserEvent('swal', [
            'title' => "created",
            'text'  => "usercreated",
            'icon'  => 'success',
            'timer' => 3000
        ]);

        //redirect
        // return redirect('/booking-administrasion');
    }
}
