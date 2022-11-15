<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
use App\Models\User;
use Auth;
use App\Http\Requests\Auth\LoginRequest;

class FrontController extends Controller
{
    public function index (){
        $data = product::all();
    return view('welcome',compact('data'));
}

public function cart(){

   return view('frontend.cart');
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
    return redirect()->route('profile')->with('msg','Profile Updated Successfully!');

}

}

