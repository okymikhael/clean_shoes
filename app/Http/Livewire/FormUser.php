<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use PDO;
use Illuminate\Support\Facades\Hash;
class FormUser extends Component
{
    public $name;
    public $email;
    public $roles;
    public $role;
    public $password;
    public $event;
    public $model = User::class;

    public function render()
    {
        return view('livewire.form-user');
    }

    public function mount(){
        $id = request()->segment(count(request()->segments()));
        $data = $this->model::find($id);
        $this->event = null;
        $this->roles = Role::with('permissions')->get();

        if($data){
            // dd($data->roles);
            $this->event = $data;
            $this->name = $data->name;
            $this->email = $data->email;
            $this->role = $data->roles->pluck('id');
        }
    }

    public function submit() {
        if ($this -> event) {
            $this -> validate([
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
            ]);
            
            if (strlen($this -> password) <= 0) {
                $data = [
                    'name' => $this -> name,
                    'email' => $this -> email
                ];
            } else {
                $data = [
                    'name' => $this -> name,
                    'email' => $this -> email,
                    'password' => Hash::make($this -> password)
                ];
            }
        } else {
            $this -> validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role' => 'required',
            ]);

            $data = [
                'name' => $this -> name,
                'email' => $this -> email,
                'password' => Hash::make($this -> password)
            ];

        }

        if ($this->event) {
            $user = $this->model::find($this->event->id);
            $user->roles()->detach();
            $user->assignRole([$this->role]);
            $user->update($data);
        } else {
            $user = $this->model::create($data);
            $user->assignRole([$this->role]);
        }

        //flash message
        session() -> flash('message', 'Data Berhasil Disimpan.');

        $this -> dispatchBrowserEvent('swal', [
            'title' => "created",
            'text' => "usercreated",
            'icon' => 'success',
            'timer' => 3000
        ]);

        //redirect
        return redirect('/admin');
    }
}
