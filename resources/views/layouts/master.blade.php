<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>JavasShop Admin</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>


    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>

    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet"/>

    <link href="{{asset('css/paper-dashboard.css')}}" rel="stylesheet"/>

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>

    <link href="{{asset('css/themify-icons.css')}}" rel="stylesheet">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    JavaShop Admin
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="ti-archive"></i>
                        <p>Add Product</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="ti-view-list-alt"></i>
                        <p>View Products</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="ti-calendar"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    @yield('content')
</div>

</body>

<script src="{{asset('js/jquery-1.10.2.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
</html>
