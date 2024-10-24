<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\StockTaking;
use App\Models\StockTakingDetail;
use App\Models\User;
use Illuminate\Http\Request;

class StockTakingComponent extends Controller
{
    public function show(){
        $users=User::all();
        $stock_takings=StockTaking::all();
        return view('livewire/stock-taking-component',['users'=>$users,
    'stock_takings'=>$stock_takings]);
    }

    public function submit(Request $request){
        $stocktaking=new StockTaking();
        $stocktaking->note=$request->note;
        $stocktaking->code=$request->stock_take;
        $stocktaking->creator=$request->creator;
        $stocktaking->save();
 
        foreach ($request->inputs as $input) {
            
            # code...
            $item=Item::where('code',$input['code'])->first();
            if($item){
                $stocktaking_details=new StockTakingDetail();
                $stocktaking_details->item=$item->id;
                $stocktaking_details->stock_taking=$request->stock_take;
                $stocktaking_details->inventory_quantity=$input['inventory_quantity'];
                $stocktaking_details->actual_quantity=$input['actual_quantity'];
                $stocktaking_details->save();
            }
        }
        foreach ($request->inputs as $input) {
            // Tìm kiếm mặt hàng dựa trên code
            $item = Item::where('code', $input['code'])->first();
            // Nếu mặt hàng đã tồn tại, cập nhật số lượng
            if ($item) {
                $item->quantity = $input['actual_quantity'];
                $item->save();
            } else {
                // Nếu mặt hàng chưa tồn tại, tạo mới mặt hàng
                Item::create([
                    'code' => $input['code'],
                    'name' => $input['name'],
                    // 'quantity' => $input['quantity'],
                    // 'unit_price' => $input['unit_price'],
                    // 'discount' => $input['discount'],
                    // 'total_price' => ($input['quantity'] * $input['unit_price']) - $input['discount'],
                    // 'stocktaking_id' => $stocktaking->id, // giả sử bạn có trường này trong bảng items
                ]);
            }; 
        // return response()->json(['res'=>'Thêm phiếu nhập hàng thành công!']);
        return back()->with('success','Thêm phiếu nhập thành công!');
    }
}

    public function showAddBlade(){
        $users=User::all();
        $stock_takings=StockTaking::all();
        return view('livewire/add-stock-take-component',['users'=>$users,
    'stock_takings'=>$stock_takings]);
    }
}
