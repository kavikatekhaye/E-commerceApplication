<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DataTables;


class UserController extends Controller
{
    // public function table(){
    //     $data = User::get();
    //     return view('backend.admin.user.table',compact('data'));
    //  }
public function detail($id){
    $data=User::find($id);
    return view('backend.admin.user.detail',compact('data'));
}
public function profile(){
    $user=Auth::user();

    return view('backend.admin.profile',compact('user'));

}

public function update(Request $request,$id){

    $request->validate(['password'=>'nullable']);
    $user=User::find($id);
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=bcrypt($request->password);
    $user->save();

}
public function table(Request $request){
    if($request->ajax()){
     $users = User::get();
     return DataTables::of($users)
     ->addColumn('action',function($user){
        $btn='<a href="detail/'.$user->id .'" type="button" class="btn btn-sm btn-primary ti-view-list-alt" title="Detail"></a>';
          return  $btn;
         })
     ->make(true);

    }
    return view('backend.admin.user.table',);
 }


}


