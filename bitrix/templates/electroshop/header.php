<?php
use Bitrix\Modules\Main\Page\Asset;
CJSCore::Init(array("jquery"));?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php $APPLICATION->ShowHead(); //подключение скриптов со страницы шаблона ?>

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title><?php $APPLICATION->ShowTitle(); ?></title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/assets/css/style.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<?php $APPLICATION->ShowPanel(); //панель админки?>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "standard.php",
                                "PATH" => "include/include_area_tel.php"
                            )
                        ); ?>
                    </a>
                </li>
                <li><a href="#"><? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "standard.php",
                                "PATH" => "include/include_area_mail.php"
                            )
                        ); ?></a></li>
                <li><a href="#"><? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "standard.php",
                                "PATH" => "include/include_area_adress.php"
                            )
                        ); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">All Categories</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select>
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">


                        <!-- Cart -->
                        <div class="dropdown">
                            <div id="bid">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="/personal/basket.php">
                                <!-- container --><? $APPLICATION->IncludeComponent(
                                    "bitrix:sale.basket.basket.line",
                                    "template1",
                                    array(
                                        "HIDE_ON_BASKET_PAGES" => "Y",
                                        "PATH_TO_AUTHORIZE" => "",
                                        "PATH_TO_BASKET" => SITE_DIR . "personal/basket.php",
                                        "PATH_TO_ORDER" => SITE_DIR . "personal/order/make/",
                                        "PATH_TO_PERSONAL" => SITE_DIR . "personal/",
                                        "PATH_TO_PROFILE" => SITE_DIR . "personal/",
                                        "PATH_TO_REGISTER" => SITE_DIR . "login/",
                                        "POSITION_FIXED" => "N",
                                        "SHOW_AUTHOR" => "N",
                                        "SHOW_EMPTY_VALUES" => "Y",
                                        "SHOW_NUM_PRODUCTS" => "Y",
                                        "SHOW_PERSONAL_LINK" => "Y",
                                        "SHOW_PRODUCTS" => "N",
                                        "SHOW_REGISTRATION" => "Y",
                                        "SHOW_TOTAL_PRICE" => "Y",
                                        "COMPONENT_TEMPLATE" => "template1"
                                    ),
                                    false
                                ); ?>
                                </a>
                            </div>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/product01.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>

                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/product02.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                                <div class="cart-summary">
                                    <small>3 Item(s) selected</small>
                                    <h5>SUBTOTAL: $2940.00</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="#">View Cart</a>
                                    <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "menu_header_electro",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "top",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "top",
                        "USE_EXT" => "Y"
                    )
                ); ?>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "top_navigate", array(
                    "PATH" => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                    "SITE_ID" => "s1",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                    "START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
                ),
                    false
                ); ?>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
		