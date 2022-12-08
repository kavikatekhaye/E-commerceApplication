<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\POST;

class PostController extends Controller
{
    public function index (){
        $posts=POST::all();
        $response =[
            'success'=>true,
            'data'=>$posts,
            'message'=>'Data Added Successfully'
        ];
        return response()->json($response,201);

    }
}
