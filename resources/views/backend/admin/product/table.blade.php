@extends('backend.layouts.master')
@section('content')


<div class="content table-responsive table-full-width">
    <div class="pagetitle">
        <h1>Blog Table</h1>
        @if (session()->has('msg'))
        <div class="alert alert-success">
           {{session()->get('msg')}}
        </div>

        @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Desc</th>
            <th>Image</th>
            <th>Actions</th>
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
                <button class="btn btn-sm btn-primary ti-view-list-alt"
                        title="Details"></button>
            </td>


        {{-- </tr>
        <tr>
            <td>2</td>
            <td>Minerva Hooper</td>
            <td>$23,789</td>
            <td>Curaçao</td>
            <td><img src="assets/img/favicon.png" alt="" class="img-thumbnail"
                     style="width: 50px"></td>
            <td>
                <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                <button class="btn btn-sm btn-primary ti-view-list-alt"
                        title="Details"></button>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Sage Rodriguez</td>
            <td>$56,142</td>
            <td>Netherlands</td>
            <td><img src="assets/img/favicon.png" alt="" class="img-thumbnail"
                     style="width: 50px"></td>
            <td>
                <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                <button class="btn btn-sm btn-primary ti-view-list-alt"
                        title="Details"></button>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Philip Chaney</td>
            <td>$38,735</td>
            <td>Korea, South</td>
            <td><img src="assets/img/favicon.png" alt="" class="img-thumbnail"
                     style="width: 50px"></td>
            <td>
                <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                <button class="btn btn-sm btn-primary ti-view-list-alt"
                        title="Details"></button>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Doris Greene</td>
            <td>$63,542</td>
            <td>Malawi</td>
            <td><img src="assets/img/favicon.png" alt="" class="img-thumbnail"
                     style="width: 50px"></td>
            <td>
                <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                <button class="btn btn-sm btn-primary ti-view-list-alt"
                        title="Details"></button>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>Mason Porter</td>
            <td>$78,615</td>
            <td>Chile</td>
            <td><img src="assets/img/favicon.png" alt="" class="img-thumbnail"
                     style="width: 50px"></td>
            <td>
                <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                <button class="btn btn-sm btn-primary ti-view-list-alt"
                        title="Details"></button>
            </td>
        </tr> --}}

    </tr>
    @endforeach
        </tbody>
    </table>
    {{$data->links()}}

</div>
@endsection
