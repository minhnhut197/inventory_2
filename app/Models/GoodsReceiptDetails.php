<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsReceiptDetails extends Model
{
    use HasFactory;
    public function getItemName($id)
    {
        // Lấy tên sản phẩm từ ID của nó
        $item = Item::find($id);
        return $item ? $item->name : 'Sản phẩm không tồn tại';
    }
    
}
