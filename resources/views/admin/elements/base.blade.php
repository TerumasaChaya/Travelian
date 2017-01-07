<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            Admin
        @show
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('css')

</head>

<body>
<div id="wrapper">
    @yield('top-bar')
    @yield('side-bar')
    @yield('container')
</div>
@yield('js-footer')
@yield('page-js')
@yield('page-footer')
</body>
</html>