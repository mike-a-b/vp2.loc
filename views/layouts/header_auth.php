<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Sticky Footer Navbar Template for Bootstrap</title>
    
    <!-- Bootstrap core CSS -->
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/views/template/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">final project 2 # loftschool</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/users/login/">Авторизация</a></li>
                <li><a href="/users/register/">Регистрация</a></li>
                <li><a href="/files/list/">Список файлов</a></li>
                <li class="dropdown">
                    <a href="/users/all/" class="dropdown-toggle" data-toggle="dropdown">Список пользователей
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/users/all/desc/">По убыванию</a></li>
                        <li><a href="/users/all/asc/">По возрастанию</a></li>
                    </ul>
                </li>
                <li><a href="/users/logout/">Выход</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>