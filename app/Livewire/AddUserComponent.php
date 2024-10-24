<?php

namespace App\Livewire;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
class AddUserComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $phone;
    public $address;
    public $role;
    public $avatar;
    public function store(){
        $user=new User();
        $user->name=$this->name;
        $user->email=$this->email;
        $user->password=$this->password;
        $user->phone=$this->phone;
        $user->address=$this->address;
        $user->role=$this->role;
        $avatar_name=Carbon::now()->timestamp.'.'.$this->avatar->extension();
        $this->avatar->storeAs('avatars',$avatar_name);
        $user->avatar=$avatar_name;
        $user->save();
        session()->flash('message','A new user was added successfully!');
    }
    public function render()
    {
        return view('livewire.user-list-component')->layout('layouts.base');
    }
}
