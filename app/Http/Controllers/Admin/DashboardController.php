<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index(){
        $data=Order::all();
        $user=User::all();
        $product=Product::all();
        return view('backend.admin.dashboard',compact('data','user','product'));
    }
}
