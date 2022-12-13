@extends('backend.layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">


                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Orders</h4>
                            <p class="category">List of all orders</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped" id="datatable1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Address</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($data as $d)
                                    <tr>
                                        <td>{{$d->id}}</td>
                                        <td>{{$d->user->name}}</td>

                                        @foreach ($d->product as $dp)
                                        <td>{{$dp->name}}</td>
                                        @endforeach

                                        <td>{{$d->quantity}}</td>
                                        <td>{{$d->address}}</td>
                                        <td><span class="label label-success">Confirmed</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-success ti-close"
                                                    title="Cancel Order"></button>

                                                 <a href="{{route('admin.order.detail',$d->id)}}"><button class="btn btn-sm btn-primary ti-view-list-alt" title="Details"></button></a>
                                        </td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>

                            </table>
                            {{-- {{$data->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable1').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('admin.order.table') }}",
            "columns": [{
                    "data": "id",
                    "name": "id"
                },
                {
                    "data": "user",
                    "name": "user"
                },
                {
                    "data": "product",
                    "name": "product"
                },
                {
                    "data": "quantity",
                    "name": "quantity"


                },
                {
                    "data": "address",
                    "name": "address"


                },
                {
                    "data": "action",
                    "name": "action"


                },



            ],

        });
    });
</script>
