<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\GoodsReceipt;
use App\Models\Item;
use App\Models\Supplier;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use App\Models\Import;
use App\Models\GoodsReceiptDetails;
class ImportComponent extends Component

{
    use WithPagination;
    public $employee;
    public $supplier;
    public $category;
    public $item;
    public $quantity;
    public $unit;
    public $unit_price;
    public $total_amount;
    public $discount;
    public $receipt_code;

    public function store(){
        $import=new Import();
        $import->receipt_code=$this->receipt_code;
        $import->employee=$this->employee;
        $import->supplier=$this->supplier;
        $import->category=$this->category;
        $import->item=$this->item;
        $import->quantity=$this->quantity;
        $import->unit=$this->unit;
        $import->unit_price=$this->unit_price;
        $import->total_amount=$this->total_amount;
        $import->discount=$this->discount;
        $import->save();
        // Alert::success('A new supplier was added successfully!');
        // session()->flash('message','A new supplier was added successfully!');
        // return back()->with('message','A new supplier has been added!');
    }

    
    public function render()
    {
        $users=User::all();
        $suppliers=Supplier::all();
        $categories=Category::all();
        $items=Item::all();
        $imports=Import::paginate(5);
        $goodsreceiptdetails=GoodsReceiptDetails::all();
        $goodsreceipts=GoodsReceipt::all();
        return view('livewire.import-component',['users'=>$users,'suppliers'=>$suppliers,
        'categories'=>$categories,'items'=>$items,'imports'=>$imports,'goodsreceiptdetails'=>$goodsreceiptdetails,
        'goodsreceipts'=>$goodsreceipts])->layout('layouts.base');
    }
}
