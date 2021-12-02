<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SiteManagement;

class FormSiteManagement extends Component
{
    use WithFileUploads;

    public $logo;
    public $background;
    public $model = SiteManagement::class;

    public function render()
    {
        return view('livewire.form-site-management');
    }

    public function mount(){
        // $id = request()->segment(count(request()->segments()));
        $data = $this->model::find(1); // static content
        $this->event = null;

        if($data){
            $this->event = $data;

            $this->logo = $data->logo;
            $this->background = $data->background;
        }
    }

    public function updated($name, $value)
    {
        if($name == 'logo'){
            $this->validate([
                'logo' => 'required|max:2048|mimes:jpg,jpeg,png',
            ]);
        }else{
            $this->validate([
                'background' => 'required|max:2048|mimes:jpg,jpeg,png',
            ]);
        }
    }

    public function submit()
    {
        $this->validate([
            'logo'   => 'required',
            'background' => 'required',
        ]);

        if(gettype($this->logo) == 'string'){
            $logo = $this->logo;
        }else{
            $logoExtension = $this->logo->extension();
            $logo = $this->logo->storeAs('public/sitemanagement', 'logo.'.$logoExtension);
        }

        if(gettype($this->background) == 'string'){
            $background = $this->background;
        }else{
            $backgroundExtension = $this->background->extension();
            $background = $this->background->storeAs('public/sitemanagement', 'background.'.$backgroundExtension);
        }

        $data = [
            'logo'       => $logo,
            'background' => $background,
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
        return redirect('/site-management');
    }
}
