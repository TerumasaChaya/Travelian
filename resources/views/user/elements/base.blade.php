<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            User
        @show
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>
    @yield('css')
    @yield('js-header')

</head>

<body>
<div id="fh5co-wrapper">
    <div id="fh5co-page">
        @yield('top-bar')
        @yield('container')
        @yield('footer')
        @yield('js-footer')
        @yield('page-js')
        @yield('page-footer')
    </div>
</div>
</body>
</html>