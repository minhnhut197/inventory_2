<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function ajaxSearch(){
       $data=Item::search()->get();
    //    $result=[
    //     'status'=>true,
    //     'message'=>'Tìm được ' .$data->count() .'kết quả',
    //     'data'=>$data
    //    ];
       return $data;   
    }  
}
