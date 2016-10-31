<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        @import "/css/font-awesome.min.css";
        @import "/css/font-awesome-ie7.min.css";
        /* Space out content a bit */
        body {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        /* Everything but the jumbotron gets side spacing for mobile first views */
        .header,
        .marketing,
        .footer {
            padding-right: 15px;
            padding-left: 15px;
        }

        /* Custom page header */
        .header {
            border-bottom: 1px solid #e5e5e5;
        }
        /* Make the masthead heading the same height as the navigation */
        .header h3 {
            padding-bottom: 19px;
            margin-top: 0;
            margin-bottom: 0;
            line-height: 40px;
        }

        /* Custom page footer */
        .footer {
            padding-top: 19px;
            color: #777;
            border-top: 1px solid #e5e5e5;
        }

        /* Customize container */
        @media (min-width: 768px) {
            .container {
                max-width: 730px;
            }
        }
        .container-narrow > hr {
            margin: 30px 0;
        }

        /* Main marketing message and sign up button */
        .jumbotron {
            text-align: center;
            border-bottom: 1px solid #e5e5e5;
        }
        .jumbotron .btn {
            padding: 14px 24px;
            font-size: 21px;
        }

        /* Supporting marketing content */
        .marketing {
            margin: 40px 0;
        }
        .marketing p + h4 {
            margin-top: 28px;
        }

        /* Responsive: Portrait tablets and up */
        @media screen and (min-width: 768px) {
            /* Remove the padding we set earlier */
            .header,
            .marketing,
            .footer {
                padding-right: 0;
                padding-left: 0;
            }
            /* Space out the masthead */
            .header {
                margin-bottom: 30px;
            }
            /* Remove the bottom border on the jumbotron for visual effect */
            .jumbotron {
                border-bottom: 0;
            }
        }

        @-ms-viewport       { width: device-width; }
        /*css for login form page*/
        .or-text-row {
            display: table-row;
        }
        .or-text {
            display: table;
            width: 100%;
            position: relative;
            margin: 20px 0;
        }
        .or-text-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }
        .or-text-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #e8e8e8;
            z-order: 0;
        }
        .or-text-line {
            display: table-cell;
            text-align: center;
            position: relative;
            width: 100%;
        }
        .or-text-line p {
            margin-top:10px;
        }
        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 2px 0;
            font-size: 17px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
        .btn-group{margin-bottom: 5px;}
        .fa{padding-right: 10px;}
    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Laravel
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/admin/home') }}">Admin Home</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
                <li><a href="{{ url('/logout') }}">Logout</a></li>
                <li><a href="{{ url('/admin/login') }}">Admin Login</a></li>
                <li><a href="{{ url('/admin/register') }}">Admin Register</a></li>
                <li><a href="{{ url('/admin/logout') }}">Admin Logout</a></li>

                @if ( Auth::check() )
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif

                @if ( Auth::guard('admin')->check() )
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/admin/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@if ( Auth::check() )
    <p>User Login OK</p>
@endif
@if ( Auth::guard('admin')->check() )
    <p>Admin Login OK</p>
@endif

@yield('content')

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

@yield('js-footer')

{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
