<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Warehouse;
use App\Models\User;

class WarehouseListComponent extends Component
{
    public $id;
    public $code;
    public $name;
    public $address;
    public $capacity;
    public $used_capacity;
    public $remaining_capacity;
    public $description;
    public $warehouse_type;
    public $manager;
    public function store(){
        $warehouse=new Warehouse();
        $warehouse->code=$this->code;
        $warehouse->name=$this->name;
        $warehouse->address=$this->address;
        $warehouse->capacity=$this->capacity;
        $warehouse->used_capacity=$this->used_capacity;
        $warehouse->remaining_capacity=$this->remaining_capacity;
        // $warehouse->description=$this->description;
        $warehouse->warehouse_type=$this->warehouse_type;
        $warehouse->manager=$this->manager;
        $warehouse->save();
        session()->flash('message','A new warehouse was added successfully!');
    }
    public function update(){
        $warehouse=Warehouse::find($this->id);
        $warehouse->code=$this->code;
        $warehouse->name=$this->name;
        $warehouse->address=$this->address;
        $warehouse->capacity=$this->capacity;
        $warehouse->used_capacity=$this->used_capacity;
        $warehouse->remaining_capacity=$this->remaining_capacity;
        // $warehouse->description=$this->description;
        $warehouse->warehouse_type=$this->warehouse_type;
        $warehouse->manager=$this->manager;
        $warehouse->save();
    }
    public function mount2($id){
        $warehouse=Warehouse::where('id',$id)->first();
        $this->id=$warehouse->id;
        $this->code=$warehouse->code;
        $this->name=$warehouse->name;
        $this->address=$warehouse->address;
        $this->capacity=$warehouse->capacity;
        $this->used_capacity=$warehouse->capacity;
        $this->remaining_capacity=$warehouse->remaining_capacity;
        $this->warehouse_type=$warehouse->warehouse_type;
        $this->manager=$warehouse->manager;
    }
    public function delete($id){
        $warehouse=Warehouse::find($id);
        $warehouse->delete();
        session()->flash('message','Warehouse has been deleted!');
    }
    public function render()
    {
        $warehouses=Warehouse::all();
        $managers=User::where('role',1)->get();
        return view('livewire.warehouse-list-component',['warehouses'=>$warehouses,'managers'=>$managers])->layout('layouts.base');
    }
}
