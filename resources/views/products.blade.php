<!DOCTYPE html>
<html>
<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="{{ $keywords }}">
    <meta name="author" content="sarinweb">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title Page-->
    <title>  محصولات </title>
    <!-- Fontfaces CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}" type="text/css">


    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu-res/menu-res.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/star/star.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dropdown/dropdown.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/filter-price/filter-price.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-register/login-register.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flat-ui/flat-ui.css') }}">

</head>
<body>

    <div id="app">
        <app></app>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
    <!--star-->
    <script  src="{{ asset('js/star/star.js') }}"></script>
    <!--bootstrap-->
    <script  src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script  src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
    <!--sidebar-->
    <script src="{{ asset('js/sidebar-page-product/sidebar-page-product.js') }}"></script>
    <script  src="{{ asset('js/dropdown/dropdown.js') }}"></script>
    <!--filter-price-->
    <script src="{{ asset('js/filter-price/nouislider.min.js') }}"></script>
    <script  src="{{ asset('js/filter-price/filter-price.js') }}"></script>
    <script  src="{{ asset('js/flat-ui/flat-ui.js') }}"></script>


    <script src="{{ asset('js/modernizr.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/login-register/login-register.js') }}"></script>
</body>
</html>