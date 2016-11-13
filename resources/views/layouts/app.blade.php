<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>共有記</title>

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

<body>

@yield('content')

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

@yield('js-footer')

{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
