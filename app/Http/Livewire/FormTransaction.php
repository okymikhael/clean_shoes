<?php

namespace App\Http\Livewire;
use App\Models\Sepatu;
use App\Models\User;
use App\Models\Resi;
use Livewire\Component;
use App\Models\Transaction;
use PDO;

class FormTransaction extends Component
{
    public $sepatu_id;
    public $sepatu;
    public $user_id;
    public $user;
    public $resi_id;
    public $biaya;
    public $status_pembayaran;
    public $status_resi;
    public $id_admin;
    public $transaksi_selesai;
    public $event;
    public $model = Transaction::class;

    protected $listeners = ['selecteduser'];

    public function render()
    {
        return view('livewire.form-transaction');
    }

    public function selecteduser($id){
        $sepatu = Sepatu::where('user_id', $id)->get();
        if(count($sepatu) > 0){
            $this->sepatu = $sepatu;
            $this->emit('updateSepatu', $sepatu);
        }
    }

    public function mount(){
        $id = request()->segment(count(request()->segments()));
        $data = $this->model::find($id);
        $this->event = null;
        $this->user = User::all();
        // $this->sepatu = Sepatu::all();

        if($data){
            $this->event = $data;
            $this->sepatu = Sepatu::where('id', $data->sepatu_id)->get();
            $this->user = User::where('id', $this->sepatu[0]['user_id'])->get();

            $this->sepatu_id = $data->sepatu_id;
            $this->resi_id = $data->resi_id;
            $this->id_admin = $data->id_admin;
            $this->biaya = $data->biaya;
            $this->status_pembayaran = $data->status_pembayaran;
            $this->status_resi = Resi::latest('id')->first();
        }
    }

    public function generateResi(){
        $resi = 'TP'.rand(1000000000,9999999999);
        if(Transaction::where('resi_id', $resi)->exists()){
            $this->generateResi();
        }

        return $resi;
    }

    public function transaksiSelesai(){
        $resi = new Resi;
        $resi->resi = $this->resi_id;
        $resi->id_sepatu = $this->sepatu_id;
        $resi->status = 'Transaksi Selesai';
        $resi->save();

        return redirect('/transaction');
    }

    public function submit()
    {
        $this->validate([
            'sepatu_id'   => 'required',
            'biaya' => 'required',
            'status_pembayaran' => 'required',
        ]);
        
        $resi_id = $this->generateResi();
        $data = [
            'sepatu_id'  => $this->sepatu_id,
            'resi_id'  => $resi_id,
            'id_admin' => \Auth::user()->id,
            'biaya'  => $this->biaya,
            'status_pembayaran'  => $this->status_pembayaran,
        ];

        if($this->event){
            $this->model::find($this->event->id)->update($data);
        }else{
            $this->model::create($data);
            
            $resi = new Resi;
            $resi->resi = $resi_id;
            $resi->id_sepatu = $data['sepatu_id'];
            $resi->status = 'Pesanan Dibuat';
            $resi->save();
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
        return redirect('/transaction');
    }
}
