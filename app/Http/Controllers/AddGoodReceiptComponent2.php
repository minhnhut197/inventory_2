<?php

namespace App\Http\Controllers;

use App\Models\GoodsReceiptDetails;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\GoodsReceipt;

class AddGoodReceiptComponent2 extends Controller
{
    public function show()
    {
        $users = User::all();
        $suppliers=Supplier::all();
        return view('livewire/add-good-receipt-component2', ['users' => $users,
    'suppliers'=>$suppliers]);
    }

    public function submit(Request $request){
        // dd($request->all());
        // $request->validate([
        //     'code.*.name'=>'require'
        // ],
        // [
        //     'input.*.name'=>'Trường Tên không được để trống!'
        // ]);
        $receipt=new GoodsReceipt;
        $receipt->supplier=$request->supplier;
        $receipt->code=$request->code_receipt;
        $receipt->creator=$request->creator;
        $receipt->save();
 
        foreach ($request->inputs as $input) {
            
            # code...
            $item=Item::where('code',$input['code'])->first();
            if($item){
                $receipt_details=new GoodsReceiptDetails();
                $receipt_details->item=$item->code;
                $receipt_details->code=$request->code_receipt;
                $receipt_details->quantity=$input['quantity'];
                $receipt_details->unit_price=$input['unit_price'];
                $receipt_details->discount=$input['discount'];
                $receipt_details->save();
            }
        }
        foreach ($request->inputs as $input) {
            // Tìm kiếm mặt hàng dựa trên code
            $item = Item::where('code', $input['code'])->first();
            // Nếu mặt hàng đã tồn tại, cập nhật số lượng
            if ($item) {
                $item->quantity += $input['quantity'];
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
                    // 'receipt_id' => $receipt->id, // giả sử bạn có trường này trong bảng items
                ]);
            }; 
        // return response()->json(['res'=>'Thêm phiếu nhập hàng thành công!']);
        return back()->with('success','Thêm phiếu nhập thành công!');
    }

}
}
