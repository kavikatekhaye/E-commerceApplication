@extends('backend.layouts.master')
@section('content')


    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-md-10">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Profile</h4>
                        </div>
                        <div class="content">
                            {{-- @if (session ()->has('msg'))
                            <div class="alert alert-success">
                                {{session()->get('msg')}}
                            </div>
                            @endif --}}
                            <form action="{{route('update',$user->id)}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" class="form-control border-input"
                                                placeholder="name"id="name"value="{{ $user->name }}" name="name">
                                        </div>

                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="text" class="form-control border-input"
                                                placeholder="email"id="email"value="{{ $user->email }}" name="email">
                                        </div>



                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="text" class="form-control border-input"
                                                placeholder="password"id="password"value="" name="password">
                                        </div>

                                        <div class="">
                                            <button type="update" class="btn btn-info btn-fill btn-wd">Update</button>
                                        </div>

                                    </div>

                                </div>
                                <div class="">

                                </div>
                                <div class="clearfix"></div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

