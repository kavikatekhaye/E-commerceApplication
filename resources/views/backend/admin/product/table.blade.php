


@extends('backend.layouts.master')
@section('content')


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (session()->has('msg'))
                    <div class="alert alert-success">
                       {{session()->get('msg')}}
                    </div>
                    @endif

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">All Products</h4>
                                <p class="category"> </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th> Product ID</th>
                                        <th> Product Name</th>
                                        <th> Product Price</th>
                                        <th> Product Desc</th>
                                        <th>Product Image</th>
                                        <th> ProductActions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                    <tr>
                                        <td>{{$d->id}}</td>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->price}}</td>
                                        <td>{!!$d->description!!}</td>
                                        <td><img src="{{asset('uploads/'.$d->image)}}" alt="" class="img-thumbnail"
                                                 style="width: 50px"></td>
                                        <td>
                                           <a href="{{route('admin.product.edit',$d->id)}}"><button class="btn btn-sm btn-info ti-pencil-alt"  title="Edit"></button></a>
                                           <a href="{{route('admin.product.delete',$d->id)}}"> <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button></a>
                                            <a href="{{route('admin.product.detail',$d->id)}}"><button class="btn btn-sm btn-primary ti-view-list-alt" title="Details"></button></a>

                                        </td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$data->links()}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
