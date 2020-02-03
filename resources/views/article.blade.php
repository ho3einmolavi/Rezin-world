<!DOCTYPE html>
<html>
<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-scale="1">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="{{ $article->keywords }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Sarinweb">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title Page-->
    <title> صفحه اختصاصی مقاله  </title>
    <!-- Fontfaces CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css" type="text/css">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/menu-res/menu-res.css">
    <link rel="stylesheet" type="text/css" href="/css/login-register/login-register.css">
</head>
<body>

<div id="app">
    <another-header></another-header>
    <div class="col col-sm col-xs col-md col-lg col-xl-12 body-main">
        <div class="col col-sm col-xs col-md col-lg col-xl-12 single-article-main delete-padding">
            <div class="col col-sm col-xs col-md col-lg col-xl-12 single-article-main-img delete-padding">
                <img src="/images/articles/{{$article->cover}}">
            </div>
            <div class="col col-sm col-xs col-md col-lg col-xl-12 single-article-main-des delete-padding">
                <div class="col col-sm col-xs col-md col-lg col-xl-12 single-article-main-des-subject delete-padding">
                    <span>   {{$article->title}}  </span>
                </div>
                <div class="col col-sm col-xs col-md col-lg col-xl-12 single-article-main-des-name delete-padding">
                    @if($user)
                    <span class="text-black title-4"> {{$user->first_name}}  {{$user->last_name}} </span>
                    @endif
                    <span class="text-black title-4">  {{ $date }} </span>
                    <span class="text-black title-4">در ساعت {{ $time }}  </span>
                </div>
                <div class="col col-sm col-xs col-md col-lg col-xl-12 single-article-main-des-description delete-padding">
                    <p class="title-4 text-black"> {{ $article->body }} <br>
                       <br>
                    </p>
                </div>

            </div>
        </div>
        </div>
    <main-footer></main-footer>
</div>

<!--bootstrap-->
<script src="{{ asset('js/app.js') }}"></script>
<script  src="/js/bootstrap/bootstrap.min.js"></script>
<script  src="/js/bootstrap/bootstrap.js"></script>

<script src="/js/jquery.min.js"></script>

<script src="/js/modernizr.min.js"></script>
<!--login-register---->
<script src="/js/login-register/login-register.js"></script>
</body>
</html>