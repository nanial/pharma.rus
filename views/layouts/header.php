<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Главная</title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet">
        <link href="/template/css/font-awesome.min.css" rel="stylesheet">
        <link href="/template/css/prettyPhoto.css" rel="stylesheet">
        <link href="/template/css/price-range.css" rel="stylesheet">
        <link href="/template/css/animate.css" rel="stylesheet">
        <link href="/template/css/main.css" rel="stylesheet">
        <link href="/template/css/responsive.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Tenor+Sans" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="icon" sizes="100x100" href="/template/images/ico/favicon.png">
       
    </head><!--/head-->

    <body>
        <div class="page-wrapper">
            <header id="header"><!--header-->             
                <div class="header-middle"><!--header-middle-->
                    <div class="container">
                        <div class="row">
                       
                            <div class="col-sm-4">
                                <div class="logo pull-left">
                                    <a href="/"><img src="/template/images/home/logo.png" alt="" /></a>                                  
                                </div>
                                <h3>  ОАО "ФАРМА"</h3>
                                
                            </div>
                            <div class="col-sm-8">
                                <div class="shop-menu pull-right">
                                    <ul class="nav navbar-nav">
                                        <li><a href="/cart">
                                                <i class="fa fa-shopping-cart"></i> Корзина 
                                                (<span id="cart-count"><?php Cart::countItems(); ?></span>)
                                            </a>
                                        </li>
                                        <?php if (User::isGuest()): ?>                                        
                                            <li><a href="/user/login/"><i class="fa fa-lock"></i> Вход</a></li>
                                            <li><a href="/user/register/"><i class="fa fa-lock"></i> Регистрация</a></li>
                                        <?php else: ?>
                                            <li><a href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>
                                            <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
                                        <?php endif; ?>
                                        <li><a href="/user/search/"><img src="/template/images/home/searchicon.png" alt="" />  Поиск</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/header-middle-->

                <div class="header-bottom"><!--header-bottom-->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="mainmenu pull-left">
                                    <ul class="nav navbar-nav collapse navbar-collapse">
                                        <li><a href="/">Главная</a></li>
                                        <li class="dropdown"><a href="#">Аптека<i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="sub-menu">
                                                <li><a href="/catalog/">Каталог товаров</a></li>
                                                <li><a href="/cart/">Корзина</a></li> 
                                            </ul>
                                        </li>
                                        <li><a href="/about/">О нас</a></li>
                                        <li><a href="/contacts/">Напишите нам</a></li>
                                        <li><a href="/feedback/">Контакты</a></li>
                                        <li><a href="/history/">История</a></li>
                                        <li><a href="/technologyNow/">Новые технологии</a></li>
                                        <li><a href="/gift/">Сертификат</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/header-bottom-->
            
            </header><!--/header-->