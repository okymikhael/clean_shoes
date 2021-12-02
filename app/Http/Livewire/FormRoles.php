<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class FormRoles extends Component
{
    public $name;
    public $permission = [];
    public $permission_val = [];
    public $event;
    public $model = Role::class;

    public function render()
    {
        return view('livewire.form-roles');
    }

    public function mount(){
        $id = request()->segment(count(request()->segments()));
        $data = $this->model::find($id);
        $this->event = null;

        $permission = Permission::get();
        $this->permission = $permission;

        if($data){
            $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get()->pluck('id')->toArray();
            $rolePermissions = array_map('strval', $rolePermissions);
            
            $this->event = $data;
            $this->name = $data->name;
            $this->permission_val = $rolePermissions;
        }
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $permission = array_filter($this->permission_val);
        $data = [
            'name'  => $this->name,
        ];

        if($this->event){
            $role = Role::find($this->event->id);
            $role->name = $this->name;
            $role->save();

            $role->syncPermissions($permission);
        }else{
            $role = Role::create($data);
            $role->syncPermissions($permission);
        }

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');

        $this->dispatchBrowserEvent('swal', [
            'title' => "created",
            'text'  => "rolecreated",
            'icon'  => 'success',
            'timer' => 3000
        ]);

        //redirect
        return redirect('/roles');
    }
}
