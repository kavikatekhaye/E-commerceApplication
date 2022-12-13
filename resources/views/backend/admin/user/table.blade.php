@extends('backend.layouts.master')
@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Users</h4>
                                <p class="category">List of all registered users</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" id="datatable1">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Roles</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($data as $d)
                                    <tr>
                                        <td>{{$d->id}}</td>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->email}}</td>
                                        <td>{{$d->address}}</td>
                                        <td>{{$d->roles}}</td>
                                        <td><span class="label label-success">Active</label></td>
                                        <td>
                                            <button class="btn btn-sm btn-success ti-close" title="Block User"></button>

                                            <a href="{{route('admin.user.detail',$d->id)}}"><button class="btn btn-sm btn-primary ti-view-list-alt" title="Details"></button></a>
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
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script >
  $(document).ready( function () {
    $('#datatable1').DataTable({
        "processing":true,
        "serverSide":true,
        "ajax":"{{route('admin.user.table')}}",
        "columns":[{
            "data":"id",
            "name":"id"
        },
        {
            "data":"name",
            "name":"name"
        },
        {
            "data":"email",
            "name":"email"
        },
        {
            "data":"address",
            "name":"address"
        },
        {
            "data":"roles",
            "name":"roles"
        },
        {
            "data":"action",
            "name":"action"
        },
    ],

    });
} );
</script>
