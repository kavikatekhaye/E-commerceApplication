
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

                                <table class="table table-striped" id="datatable1">
                                    <thead>
                                    <tr>
                                        <th> Product ID</th>
                                        <th> Product Name</th>
                                        <th> Product Price</th>
                                        <th> Product Desc</th>
                                         <th>Product Image</th>
                                        <th> Product Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @endsection
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script >
  $(document).ready( function () {
    $('#datatable1').DataTable({
        "processing":true,
        "serverSide":true,
        "ajax":"{{route('admin.product.table')}}",
        "columns":[{
            "data":"id",
            "name":"id"
        },
        {
            "data":"name",
            "name":"name"
        },
        {
            "data":"price",
            "name":"price"
        },
        {
            "data":"description",
            "name":"description"
        },
        {
            "data":"getImage",
            "name":"getImage"
        },
        {
            "data":"action",
            "name":"action"
        },
    ],

    });
} );
</script>


