@extends('backend.layouts.master')
@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Order Detail</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <tbody>

                                        <tr>
                                            <th>ID</th>
                                            <td>{{$data->id}}</td>
                                        </tr>

                                        <tr>
                                            <th>User</th>
                                            <td>{{$data->user->name}}</td>
                                        </tr>

                                        <tr>
                                            <th>Product</th>
                                            @foreach ($data->product as $dp)
                                            <td>{{$dp->name}}</td>
                                            @endforeach


                                        </tr>

                                        <tr>
                                            <th>Quantity</th>
                                            <td>{{$data->quantity}}</td>
                                        </tr>

                                        <tr>
                                            <th>Address</th>
                                            <td>{{$data->address}}</td>
                                        </tr>

                                        <tr>
                                            {{-- <th></th>
                                            <td>{{$data->updated_at}}</td> --}}
                                        </tr>

                                        {{-- <tr>
                                            <th>Image</th>
                                            <td><img src="{{asset('uploads/'.$data->image)}}" alt="" class="img-thumbnail"
                                                style="width: 50px"></td>
                                       </tr> --}}

                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
