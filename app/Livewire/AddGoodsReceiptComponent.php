<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\GoodsReceipt;
use App\Models\GoodsReceiptDetails;
use App\Models\Supplier;
use Livewire\Component;
use App\Models\User;
use App\Models\Item;
class AddGoodsReceiptComponent extends Component
{
    public $searchTerm='';
    // public $items;
    public $category;
    public $category_id;
    public $name;
    public $supplier;
    public $creator;
    public $code;
    public $quantity;
    public $unit_price;
    public $discount;
    public $item;

    public function mount(){
        $this->category='All product';
    }

    public function store(){
        $goodsreceiptdetails=new GoodsReceiptDetails();
        $goodsreceiptdetails->code=$this->code;
        $goodsreceiptdetails->quantity=$this->quantity;
        $goodsreceiptdetails->unit_price=$this->unit_price;
        $goodsreceiptdetails->discount=$this->discount;
        $goodsreceiptdetails->save();
        $goodsreceipt=new GoodsReceipt();
        $goodsreceipt->code=$this->code;
        $goodsreceipt->creator=$this->creator;
        $goodsreceipt->supplier=$this->supplier;
        $goodsreceipt->save();
        
    }

    public function render()
    {
        $users=User::all();
        $suppliers=Supplier::all();
        $categories=Category::all();
        
        // if(empty($this->searchTerm)){
        //     $this->items=Item::where('name',$this->searchTerm)->get();
        // }else{
            $items=Item::where('name','like','%'.$this->searchTerm.'%')->get();
        // }
        return view('livewire.add-goods-receipt-component',
        ['users'=>$users,'suppliers'=>$suppliers,'categories'=>$categories,'items'=>$items])->layout('layouts.base');
    }
}
