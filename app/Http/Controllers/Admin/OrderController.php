<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use DataTables;

class OrderController extends Controller
{
//  public function table(){
//     $data = order::with('user','product')->get();
//     // dd($data);
//     return view('backend.admin.order.table',compact('data'));
//  }

 public function detail($id){
    $data=Order::find($id);
    return view('backend.admin.order.detail',compact('data'));

}

public function table(Request $request){
   if($request->ajax()){
    $users = Order::with('user','product')->get();
    return DataTables::of($users)

      ->editColumn('user',function($user){
         return $user->user->name;
      })
      ->editColumn('product',function($product){
         return $product->product[0]->name;
      })
      ->addColumn('action',function($user){
         $btn='<a href="detail/'.$user->id .'" type="button" class="btn btn-sm btn-primary ti-view-list-alt" title="Detail"></a>';
           return  $btn;
          })


    ->make(true);

   }
   return view('backend.admin.order.table',);
}

}
