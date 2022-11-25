@extends('frontend.layouts.master')
@section('content')


    <!-- Page Content -->
    <div class="container">


        <div class="row">

            <div class="col-md-12" id="register">

                <div class="card col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">Sign In</h2>
                        <hr>
                        <form action="{{ route('signin.store') }}"method="POST">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- @if (session()->has('msg'))
                                <div class="alert alert-success">
                                    {{ session()->get('msg') }}
                                </div>
                            @endif --}}

                            @if (session()->has('msg'))
                                <div class="alert alert-success alert-dismissable">
                                    {{ session()->get('msg') }}
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                </div>
                            @endif


                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" name="password" placeholder="Password" id="password" class="form-control">
                    </div>


                    <div class="form-group">
                        <button class="btn btn-outline-info col-md-2"> Log In</button>


                        <a class="btn btn-outline-info col-md-2.5" href="{{ route('signup') }}"> Create an account</a>
                    </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

    </div>
@endsection
