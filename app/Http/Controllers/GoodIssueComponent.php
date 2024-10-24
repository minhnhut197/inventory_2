<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\GoodIssueDetail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Supplier;
use App\Models\GoodIssue;
use App\Models\Item;

class GoodIssueComponent extends Controller
{
    public function show()
    {
        $users = User::all();
        $suppliers=Supplier::all();
        $goodissues=GoodIssue::paginate(5);
        $customers=Customer::paginate(5);
        return view('livewire/good-issue-component', ['users' => $users,
    'suppliers'=>$suppliers,'goodissues'=>$goodissues,'customers'=>$customers]);
    }

    public function submit(Request $request){
        $issue=new GoodIssue();
        $issue->customer=$request->customer;
        $issue->code=$request->good_issue;
        $issue->creator=$request->creator;
        $issue->save();
 
        foreach ($request->inputs as $input) {
            
            # code...
            $item=Item::where('code',$input['code'])->first();
            if($item){
                $issue_details=new GoodIssueDetail();
                $issue_details->item=$item->code;
                $issue_details->good_issue=$request->good_issue;
                $issue_details->quantity=$input['quantity'];
                $issue_details->unit_price=$input['unit_price'];
                $issue_details->discount=$input['discount'];
                $issue_details->save();
            }
        }
        foreach ($request->inputs as $input) {
            // Tìm kiếm mặt hàng dựa trên code
            $item = Item::where('code', $input['code'])->first();
            // Nếu mặt hàng đã tồn tại, cập nhật số lượng
            if ($item) {
                $item->quantity -= $input['quantity'];
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
                    // 'issue_id' => $issue->id, // giả sử bạn có trường này trong bảng items
                ]);
            }; 
        // return response()->json(['res'=>'Thêm phiếu nhập hàng thành công!']);
        return back()->with('success','Thêm phiếu nhập thành công!');
    }
}

    public function showAddModal()
    {
        $users = User::all();
        $suppliers=Supplier::all();
        $goodissues=GoodIssue::paginate(5);
        $customers=Customer::all();
        return view('livewire/add-good-issue-modal', ['users' => $users,
    'suppliers'=>$suppliers,'goodissues'=>$goodissues,'customers'=>$customers]);
    }
}
