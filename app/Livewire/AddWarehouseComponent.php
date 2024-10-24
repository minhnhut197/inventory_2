<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\WarehouseType;
use App\Models\Warehouse;

class AddWarehouseComponent extends Component
{
    public $name;
    public $address;
    public $capacity;
    public $used_capacity;
    public $remaining_capacity;
    public $description;
    public $manager_id;
    public $warehouse_type;
    public function store(){
        $warehouse=new Warehouse();
        $warehouse->name=$this->name;
        $warehouse->address=$this->address;
        $warehouse->capacity=$this->capacity;
        $warehouse->used_capacity=$this->used_capacity;
        $warehouse->remaining_capacity=$this->remaining_capacity;
        $warehouse->description=$this->description;
        $warehouse->manager_id=$this->manager_id;
        $warehouse->warehouse_type=$this->warehouse_type;
        $warehouse->save();
        session()->flash('messages','A new warehouse has been added!');
    }
    public function render()
    {
        $users=User::all();
        $types=WarehouseType::all();
        return view('livewire.add-warehouse-component',['users'=>$users,'types'=>$types])->layout('layouts.base');
    }
}
