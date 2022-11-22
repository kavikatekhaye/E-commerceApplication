<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
use App\Models\User;
use Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
class FrontController extends Controller

{

    public function cart_store(Request $request)
    {
         Cart::add($request->id,$request->name,1,$request->price,550);
         return redirect()->route('index')->with('msg',"Item Added Successfully !");
    }


    public function index (){
        $data = product::all();
    return view('welcome',compact('data'));
}

public function cart(){
    $data=Cart::instance('default')->content();
    // dd($data);
   return view('frontend.cart',compact('data'));

}


public function signup(){
    return view('frontend.sign-up');
 }


 public function store(Request $request)
 {
    $request->validate([
    'name'=>'required',
    'email'=>'required',
    'password'=>'required'
    ]);
    $data=new User();
    $data->name=$request->name;
    $data->email=$request->email;
    $data->password=bcrypt($request->password);
    $data->address=$request->address;
    $data->save();
    return redirect()->route('signup')->with('msg','Registered Successfully');
 }

 public function signin(Request $request){

    // $request->authenticate();

    // $request->session()->regenerate();

    // return redirect()->route('/');
    return view('frontend.sign-in');
 }


 public function signin_store(LoginRequest $request)
 {
    $request->authenticate();

    $request->session()->regenerate();

    return redirect()->route('index');
 }


public function profile(){
    $user=Auth::User();
    return view('frontend.signin-profile',compact('user'));
}


public function profile_update(Request $request,$id){
    $request->validate(['password'=>'nullable']);
    $user=User::find($id);
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=bcrypt($request->password);
    $user->save();
    return redirect()->route('profile')->with('msg','Profile Updated Successfully!!');
}


public function destroy(){
    Cart::destroy();
    return redirect()->route('index')->with('msg','Cart Items Destroyed Successfully!!');
}

public function remove($rowId){
Cart::remove($rowId);
return redirect()->route('index')->with('msg',' Cart Item removed Successfully!!');
}

public function checkout(){
    $data=Cart::instance('default')->content();
    // dd($data);
   return view('frontend.check-out',compact('data'));
}

public function checkout_store(Request $request){
    $user=new User();
    $user->name=$request->name;
    $user->email=$request->email;
    $user->address=$request->address;
    $user->city=$request->city;
    $user->provance=$request->provance;
    $user->postal=$request->postal;
    $user->phone=$request->phone;
    $user->save();
    Cart::destroy()->with('msg','Cart Destroy Successfully');
    return redirect()->route('index',compact('user'));
}




}

