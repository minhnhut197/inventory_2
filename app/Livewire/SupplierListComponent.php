<?php

namespace App\Livewire;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierListComponent extends Component
{
    use WithPagination;
    public $code;
    public $name;
    public $phone;
    public $email;
    public $address;
    public $status;
    public $items;
    public $id;

    public function mount2($id){
        $supplier=Supplier::where('id',$id)->first();
        $this->id=$supplier->id;
        $this->code=$supplier->code;
        $this->name=$supplier->name;
        $this->phone=$supplier->phone;
        $this->email=$supplier->email;
        $this->address=$supplier->address;
        $this->status=$supplier->status;
        $this->items=$supplier->items;
    }

    public function update(){
        $supplier=Supplier::find($this->id);
        $supplier->code=$this->code;
        $supplier->name=$this->name;
        $supplier->phone=$this->phone;
        $supplier->email=$this->email;
        $supplier->status=$this->status;
        $supplier->address=$this->address;
        $supplier->items=$this->items;
        $supplier->save();
        // session()->flash('message','supplier has been updated!');
    }
    public function store(){
        $supplier=new Supplier();
        $supplier->code=$this->code;
        $supplier->name=$this->name;
        $supplier->phone=$this->phone;
        $supplier->email=$this->email;
        $supplier->address=$this->address;
        $supplier->status=$this->status;
        $supplier->items=$this->items;
        $supplier->save();
        // Alert::success('A new supplier was added successfully!');
        // session()->flash('message','A new supplier was added successfully!');
        // return back()->with('message','A new supplier has been added!');
    }
    public function deleteConfirm($id){
        // $this->delete_id=$id;
        // $this->dispatchBrowserEvent('show-delete-confirmation');
        $user=Supplier::find($id);
        $user->delete();
        session()->flash('message', 'User has been deleted!');
    }
    public function render()
    {
        $suppliers=Supplier::paginate(10);
        return view('livewire.supplier-list-component',['suppliers'=>$suppliers])->layout('layouts.base');
    }
}
