<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Str;
class ItemListComponent extends Component
{
    use WithPagination;
    public $id;
    public $code;
    public $name;
    public $image;
    public $category;
    public $supplier;
    public $quantity;
    public $unit;
    public $selling_price;
    public $purchase_price;
    public $stock_out_alert;
    public $status;

    public function mount2($id){
        $item=Item::where('id',$id)->first();
        $this->id=$item->id;
        $this->code=$item->code;
        $this->name=$item->name;
        $this->image=$item->image;
        $this->category=$item->category;
        $this->supplier=$item->supplier;
        $this->quantity=$item->quantity;
        $this->unit=$item->unit;
        $this->selling_price=$item->selling_price;
        $this->purchase_price=$item->purchase_price;
        $this->stock_out_alert=$item->stock_out_alert;
        $this->status=$item->status;
    }

    public function update(){
        $item=Item::find($this->id);
        $item->code=$this->code;
        $item->name=$this->name;
        $item->image=$this->image;
        $item->category=$this->category;
        $item->supplier=$this->supplier;
        $item->quantity=$this->quantity;
        $item->unit=$this->unit;
        $item->selling_price=$this->selling_price;
        $item->purchase_price=$this->purchase_price;
        $item->stock_out_alert=$this->stock_out_alert;
        $item->status=$this->status;
        $item->save();
        session()->flash('message','Item has been updated!');
    }

    public function deleteConfirm($id){
        // $this->delete_id=$id;
        // $this->dispatchBrowserEvent('show-delete-confirmation');
        $item=Item::find($id);
        $item->delete();
        session()->flash('message', 'Item has been deleted!');
    }
    public function store(){
        $item=new Item();
        $item->code=$this->code;
        $item->name=$this->name;
        $item->image=$this->image;
        $item->category=$this->category;
        $item->supplier=$this->supplier;
        $item->quantity=$this->quantity;
        $item->unit=$this->unit;
        $item->selling_price=$this->selling_price;
        $item->purchase_price=$this->purchase_price;
        $item->stock_out_alert=$this->stock_out_alert;
        $item->status=$this->status;
        $item->save();
        // Alert::success('A new supplier was added successfully!');
        // session()->flash('message','A new supplier was added successfully!');
        // return back()->with('message','A new supplier has been added!');
    }
    public function render()
    {
        $items=Item::paginate(5);
        $suppliers=Supplier::all();
        $categories=Category::all();
        return view('livewire.item-list-component',['items'=>$items,'suppliers'=>$suppliers,
        'categories'=>$categories])->layout('layouts.base');
    }
}
