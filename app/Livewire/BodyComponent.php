<?php

namespace App\Livewire;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class BodyComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $phone;
    public $address;
    public $role;
    public $avatar;
    public $id;
    public $new_avatar;
    public function mount($id){
        $user=User::where('id',$id)->first();
        $this->id=$user->id;
        $this->name=$user->name;
        $this->email=$user->email;
        $this->phone=$user->phone;
        $this->address=$user->address;
        $this->role=$user->role;
        $this->avatar=$user->avatar;
    }

    public function update(){
        $user=User::find($this->id);
        $user->name=$this->name;
        $user->email=$this->email;
        $user->phone=$this->phone;
        $user->address=$this->address;
        $user->role=$this->role;
        if($this->new_avatar){
            $avatar_name=Carbon::now()->timestamp.'.'.$this->new_avatar->extension();
            $this->new_avatar->storeAs('avatars',$avatar_name);
            $user->avatar=$avatar_name;
        }
        $user->save();
        session()->flash('message','User has been updated!');
    }
    public function deleteConfirm($id){
        // $this->delete_id=$id;
        // $this->dispatchBrowserEvent('show-delete-confirmation');
        $user=User::find($id);
        $user->delete();
        session()->flash('message', 'User has been deleted!');
    }
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
        // Alert::success('A new user was added successfully!');
        session()->flash('message','A new user was added successfully!');
        // return back()->with('message','A new user has been added!');
    }
    public function render()
    {
        $users=User::all();
        return view('livewire.body-component',['users'=>$users])->layout('layouts.base');
    }
}
