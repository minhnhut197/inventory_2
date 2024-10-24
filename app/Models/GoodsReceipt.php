<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsReceipt extends Model
{
    use HasFactory;

    public function getCreator($id){
        $goodsreceipt = GoodsReceipt::find($id);
        
        if($goodsreceipt) {
            $creator_id = $goodsreceipt->creator;
            $creator = User::find($creator_id);
            
            if($creator) {
                return $creator->name;
            }
        }
        
        return null; // hoặc giá trị mặc định khác nếu muốn
    }
    public function getSupplier($id){
        $supplier=Supplier::find($id);
        return $supplier->name;
    }
}