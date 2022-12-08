<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
use App\Models\User;
use Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;

use Validator;
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
    $data->roles=2;
    $data->address=$request->address;
    $data->save();
    return redirect()->route('signin')->with('msg','Registered Successfully Signin Now!!');
 }

 public function signin(Request $request){

 
    return view('frontend.sign-in');
 }



 public function signin_store(LoginRequest $request)
 {
     //    validate

     $rules = [
         'email'    => 'required|email',
         'password' => 'required',
     ];

     $request->validate($rules);
     // check if exists
     $data = request(['email', 'password']);
     $userExist = User::where('email',$data['email'])->where('roles',2)->count();
     if($userExist == 1){
        $request->authenticate();

        $request->session()->regenerate();
        return redirect()->route('index');

     }else{
        return redirect()->route('login');

     }

     if (!auth()->attempt($data)) {

         return back()->with(["msg", "wrong details please try again"]);

     }
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
return redirect()->route('cart')->with('msg',' Cart Item removed Successfully!!');
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
    Cart::destroy();
    return redirect()->route('index',compact('user'))->with('msg','Order Placed Successfully');
}

public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'qty' => 'required|numeric|between: 1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors','Quantity must be between 1 and 5');
            return response()->json(['success' => false]);
        }

        Cart::update($id, $request->qty);

        session()->flash('msg','Quantity has been updated');

        return response()->json(['success' => true]);
    }


    public function saveForLater($id)
    {
        //    dd($id);

        $item = Cart::get($id);
        Cart::remove($id);
        $dub = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });
        if ($dub->isNotEmpty()) {
            return redirect()->back()->with('msg', 'Item is  saved for later already !');

        }
        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price, 0);
        return redirect()->back()->with('msg', 'Item has been saved for later !');

    }

    public function saveForLaterDestroy($id)
    {
        Cart::instance('saveForLater')->remove($id);

        return redirect()->back()->with('msg', 'Item has been remove from save for later !');

    }
    public function moveToCart($id)
    {

        $item = Cart::instance('saveForLater')->get($id);
        Cart::instance('saveForLater')->remove($id);
        $dub = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });
        if ($dub->isNotEmpty()) {
            return redirect()->back()->with('msg', 'Item is  saved for later already !');

        }
        Cart::instance('default')->add($item->id, $item->name, 1, $item->price, 0);
        return redirect()->back()->with('msg', 'Item has been move to cart !');

    }



}

