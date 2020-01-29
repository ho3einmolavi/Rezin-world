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
    <!-- Title Page-->
    <title>  خرید محصول </title>

    <!-- Fontfaces CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css" type="text/css">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/menu-res/menu-res.css">
    <link rel="stylesheet" type="text/css" href="/css/select-number/select-number.css">
    <link rel="stylesheet" type="text/css" href="/css/login-register/login-register.css">
</head>
<body>

<div id="app">
    <card></card>
</div>



<!--bootstrap-->
<script src="{{ asset('js/app.js') }}"></script>
<script  src="/js/bootstrap/bootstrap.min.js"></script>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
<script  src="/js/bootstrap/bootstrap.js"></script>
<!--buy-card-->
<script type="/js/faq/faq.js"></script>
<script src="/js/jquery.min.js"></script>
<!--select-number-->
<!--login-register-->
<script src="/js/login-register/login-register.js"></script>
</body>
</html>