<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\WithPagination;
class UserListComponent extends Component
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
    public $gender;
    public $dateofbirth;
    public $day;
    public $month;
    public $year;
    public $status;
    // public $delete_id;
    public function mount2($id){
        $user=User::where('id',$id)->first();
        $this->id=$user->id;
        $this->name=$user->name;
        $this->gender=$user->gender;
        $this->dateofbirth = Carbon::parse($user->dateofbirth);
        $this->day = $this->dateofbirth->day;
        $this->month=$this->dateofbirth->month;
        $this->year=$this->dateofbirth->year;
        $this->email=$user->email;
        $this->phone=$user->phone;
        $this->address=$user->address;
        $this->password=$user->password;
        $this->role=$user->role;
        $this->status=$user->status;
        $this->avatar=$user->avatar;
    }

    public function update(){
        $user=User::find($this->id);
        $user->name=$this->name;
        $user->gender=$this->gender;
        $user->dateofbirth = Carbon::create($this->year, $this->month, $this->day)->setTime(0, 0, 0);
        $user->email=$this->email;
        $user->phone=$this->phone;
        $user->address=$this->address;
        $user->role=$this->role;
        $user->status=$this->status;
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
    // public function deleteConfirm($method, $id = null)
    // {
    //     $this->dispatchBrowserEvent('swal:confirm', [
    //         'type'   => 'warning',
    //         'title'  => 'Are you sure?',
    //         'text'   => '',
    //         'id'     => $id,
    //         'method' => $method,
    //     ]);
    // }
    public function store(){
        $user=new User();
        $user->name=$this->name;
        $user->gender=$this->gender;
        $user->dateofbirth = Carbon::create($this->year, $this->month, $this->day)->startOfDay();
        $user->email=$this->email;
        $user->password=$this->password;
        $user->phone=$this->phone;
        $user->address=$this->address;
        $user->role=$this->role;
        $user->status=$this->status;
        // $avatar_name=Carbon::now()->timestamp.'.'.$this->avatar->extension();
        // $this->avatar->storeAs('avatars',$avatar_name);
        // $user->avatar=$avatar_name;
        $user->save();
        // Alert::success('A new user was added successfully!');
        session()->flash('message','A new user was added successfully!');
        // return back()->with('message','A new user has been added!');
    }
    public function render()
    {
        $users=User::paginate(5);
        return view('livewire.user-list-component',['users'=>$users])->layout('layouts.base');
    }
}
