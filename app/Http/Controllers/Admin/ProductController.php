<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use DataTables;

class ProductController extends Controller
{
    public function create(){
        return view('backend.admin.product.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',

        ]);

        $data=new Product();
        $data->name=$request->name;
        $data->price=$request->price;
       $data->description=$request->description;

       if($request->hasFile('image'))
            {
                $file=$request->image;
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('uploads',$filename);
                $data->image=$filename;
            }
       $data->save();
       return redirect()->route('admin.product.table')->with('msg','Date Inserted Successfully!');
    }
    //    public function table(){
    //     $data=Product::get();
    //     return view('backend.admin.product.table',compact('data'));
    // }
public function edit($id){
        $data=Product::find($id);
        return view('backend.admin.product.edit',compact('data'));

    }
        public function update(Request $request,$id){
                $validated = $request->validate([
                    'name' => 'required',
                    'price' => 'required',
                    'description' => 'required',
                ]);

                $data=Product::find($id);
                $data->name=$request->name;
                $data->price=$request->price;
            $data->description=$request->description;

            if($request->hasFile('image'))
                    {
                        $file=$request->image;
                        $extension=$file->getClientOriginalExtension();
                        $filename=time().'.'.$extension;
                        $file->move('uploads',$filename);
                        $data->image=$filename;
                    }
            $data->save();
            return redirect()->route('admin.product.table')->with('msg','Date Updated Successfully!');
            }

    public function delete($id){
        $data=Product::find($id);
        $data->delete();
        return redirect()->route('admin.product.table')->with('msg','Date Deleted Successfully!');
    }
    public function detail($id){
        $data=Product::find($id);
        return view('backend.admin.product.detail',compact('data'));

    }
    public function table(Request $request){
        if($request->ajax()){
         $users = Product::get();
         return DataTables::of($users)
         ->addColumn('action',function($user){
            $btn='<a href="edit/'.$user->id .'" type="button" class="btn btn-sm btn-info ti-pencil-alt" title="Edit"> </a>
            <a href="delete/'.$user->id .'" type="button" class="btn btn-sm btn-danger ti-trash" title="delete">  <br>
            </a> <a href="detail/'.$user->id .'" type="button" class="btn btn-sm btn-primary ti-view-list-alt" title="Detail"></a>';
              return  $btn;
             })
             ->editColumn('description',function($user){
                return $user->description;
             })
             ->addColumn('getImage', function($user){
                if($user->image){
                  $url=asset("uploads/" .$user->image);
                  return '<img src='.$url.' border="0" width="40px" class="img-rounded" align="center"/>';
              }else{
                  $url=asset("/uploads/no-image.png");
                  return '<img src='.$url.' border="0" width="40px" class="img-rounded" align="center"/>';
              }
            })
            ->rawColumns(['getImage', 'action'])->make(true);

        }
        return view('backend.admin.product.table',);
     }
}
