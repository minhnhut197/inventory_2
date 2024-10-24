<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Customer;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Livewire\WithPagination;
class CustomerListComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name;
    public $email;
    public $phone;
    public $address;
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
        $customer=Customer::where('id',$id)->first();
        $this->id=$customer->id;
        $this->name=$customer->name;
        $this->gender=$customer->gender;
        $this->dateofbirth = Carbon::parse($customer->dateofbirth);
        $this->day = $this->dateofbirth->day;
        $this->month=$this->dateofbirth->month;
        $this->year=$this->dateofbirth->year;
        $this->email=$customer->email;
        $this->phone=$customer->phone;
        $this->address=$customer->address;
        $this->status=$customer->status;
        $this->avatar=$customer->avatar;
    }

    public function update(){
        $customer=Customer::find($this->id);
        $customer->name=$this->name;
        $customer->gender=$this->gender;
        $customer->dateofbirth = Carbon::create($this->year, $this->month, $this->day)->setTime(0, 0, 0);
        $customer->email=$this->email;
        $customer->phone=$this->phone;
        $customer->address=$this->address;
        $customer->status=$this->status;
        if($this->new_avatar){
            $avatar_name=Carbon::now()->timestamp.'.'.$this->new_avatar->extension();
            $this->new_avatar->storeAs('avatars',$avatar_name);
            $customer->avatar=$avatar_name;
        }
        $customer->save();
        session()->flash('message','customer has been updated!');
    }

    public function deleteConfirm($id){
        // $this->delete_id=$id;
        // $this->dispatchBrowserEvent('show-delete-confirmation');
        $customer=customer::find($id);
        $customer->delete();
        session()->flash('message', 'customer has been deleted!');
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
        $customer=new customer();
        $customer->name=$this->name;
        $customer->gender=$this->gender;
        $customer->dateofbirth = Carbon::create($this->year, $this->month, $this->day)->startOfDay();
        $customer->email=$this->email;
        $customer->phone=$this->phone;
        $customer->address=$this->address;
        $customer->status=$this->status;
        // $avatar_name=Carbon::now()->timestamp.'.'.$this->avatar->extension();
        // $this->avatar->storeAs('avatars',$avatar_name);
        // $customer->avatar=$avatar_name;
        $customer->save();
        // Alert::success('A new customer was added successfully!');
        session()->flash('message','A new customer was added successfully!');
        // return back()->with('message','A new customer has been added!');
    }
    public function render()
    {
        $customers=Customer::paginate(5);
        return view('livewire.customer-list-component',['customers'=>$customers])->layout('layouts.base');
    }
}
