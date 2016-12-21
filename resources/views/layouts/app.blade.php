<!DOCTYPE html>
<html lang="ja">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>共遊記</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <link href="/css/login-theme-4.css" rel="stylesheet">
    <link href="/css/login-theme-4-animate.css" rel="stylesheet">

    <script src="/js/custom.modernizr.js" type="text/javascript"></script>

</head>

<body class="fade-in" style="

background: radial-gradient(rgb(241, 196, 15), rgb(243, 156, 18));
background: -webkit-radial-gradient(rgb(241, 196, 15), rgb(243, 156, 18));

/* 背景を画像にする場合
/*
  background-image: url(/webImage/tiitle-back.jpg);
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;/
  background-size: cover;
  */
">

@yield('content')

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- End Login box -->
<footer class="container">
    <p id="footer-text"><small>Copyright &copy; 2016 <a href="http://ad-says.com/">Travelial</a></small></p>
</footer>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/login-placeholder-shim.min.js"></script>
</body>
</html>
