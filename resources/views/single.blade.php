<!DOCTYPE html>
<html>
<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Sarinweb">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Page-->
    <title> کارد </title>
    <!-- Fontfaces CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css" type="text/css">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/menu-res/menu-res.css">
    <link rel="stylesheet" type="text/css" href="/css/star/star.css">
    <link rel="stylesheet" type="text/css" href="/css/gallery/gallery.css">
    <link rel="stylesheet" type="text/css" href="/css/select-number/select-number.css">
    <link rel="stylesheet" type="text/css" href="/css/comment-product/comment.css">
    <link rel="stylesheet" type="text/css" href="/css/faq/faq.css">
    <link rel="stylesheet" type="text/css" href="/css/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="/css/login-register/login-register.css">
</head>
<body>

    <div id="app">
        <single></single>
    </div>


    <!--star-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script  src="/js/star/star.js"></script>
    <!--bootstrap-->
    <script  src="/js/bootstrap/bootstrap.min.js"></script>
    <script  src="/js/bootstrap/bootstrap.js"></script>
    <!--comments-product-->
    <script src="/js/jquery.min.js"></script>
    <script  src="/js/comments/comments.js"></script>
    <script src="/js/modernizr.min.js"></script>
    <!--gallery-->
    <script src='/js/gallery/jquery.touchSwipe.min.js'></script>
    <script src="/js/gallery/gallery.js"></script>
    <!--select-number-->
    <script src="/js/select-number/select-number.js"></script>
    <!--slideshow-->
    <script src="/js/slideshow/popper.min.js"></script>
    <!--bootstrap/4.0.0 for slideshow-->
    <script src="/js/bootstrap.min.js"></script>
    <!--faq-->
    <script src="/js/faq/faq.js"></script>
    <!--login-register-->
    <script src="/js/login-register/login-register.js"></script>
</body>
</html>