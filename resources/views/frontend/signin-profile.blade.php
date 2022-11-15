@extends('frontend.layouts.master')
@section('content')


<!-- Page Content -->
<div class="container">


    <div class="row">

        <div class="col-md-12" id="register">

            <div class="card col-md-8">
                <div class="card-body">
                    <h2 class="card-title">Profile</h2>
                    <hr>
                              @if (session ()->has('msg'))
                            <div class="alert alert-success">
                                {{session()->get('msg')}}
                            </div>
                            @endif

                        <form action="{{route('profile.update',$user->id)}}" method="POST">
                            @csrf

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" placeholder="name" id="name" value="{{ $user->name}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" id="email" value="{{ $user->email}}" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="text" name="password" placeholder="Password" id="password"  value=""class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2"> Update</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>
@endsection

