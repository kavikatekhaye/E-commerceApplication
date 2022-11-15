<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign Up</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

        <a class="navbar-brand" href="#">LaravelShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i> Cart <strong>(23)</strong>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> Account
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                        <a class="dropdown-item " href="">Sign In</a>
                        <a class="dropdown-item" href="{{route('logout')}}">Log out</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

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

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>