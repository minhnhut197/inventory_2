<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Carbon\Carbon;
class EditUserComponent extends Component
{
    use WithFileUploads;
    public $id;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $role;
    public $avatar;
    public function mount($id){
        $user=User::where('id',$id)->first();
        $this->id=$user->id;
        $this->name=$user->name;
        $this->email=$user->email;
        $this->phone=$user->phone;
        $this->address=$user->address;
        $this->role=$user->role;
       
    }
    public function update(){
        $user=User::find($this->id);
        $user->name=$this->name;
        $user->email=$this->email;
        $user->phone=$this->phone;
        $user->address=$this->address;
        $user->role=$this->role;
        $avatar_name=Carbon::now()->timestamp.'.'.$this->avatar->extension();
        $this->avatar->storeAs('avatars',$avatar_name);
        $user->avatar=$avatar_name;
        $user->save();
        session()->flash('message','User has been updated!');
    }
    public function render()
    {
        return view('livewire.edit-user-component')->layout('layouts.base');
    }
}
