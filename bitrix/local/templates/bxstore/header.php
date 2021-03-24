<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!doctype html>
<html>
<head>
    <?
    $APPLICATION->ShowHead();

    use Bitrix\Main\Page\Asset;

    CJSCore::Init(array("jquery"));
    //JS
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/fancy/jquery.fancybox.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.carouFredSel-6.2.1-packed.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.mousewheel.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.touchSwipe.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.transit.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.ba-throttle-debounce.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/jquery.sudoSlider.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/myscripts.js');
    // CSS
    Asset::getInstance()->addCss('/bitrix/css/main/font-awesome.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/bootstrap.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/js/fancy/jquery.fancybox.min.css');
    ?>
    <title><? $APPLICATION->ShowTitle() ?></title>
</head>
<body>
<? $APPLICATION->ShowPanel(); ?>
<?

use Bitrix\Main\Loader;

Loader::includeModule("sale");
$delaydBasketItems = CSaleBasket::GetList(
    array(),
    array(
        "FUSER_ID" => CSaleBasket::GetBasketUserID(),
        "LID" => SITE_ID,
        "ORDER_ID" => "NULL",
        "DELAY" => "Y"
    ),
    array()
);
?>

<div class="top_site">
    <div class="site_container">
        <div class="mysity">
            <? $APPLICATION->IncludeComponent(
                "reaspekt:reaspekt.geoip",
                ".default",
                array(
                    "CHANGE_CITY_MANUAL" => "N",
                    "COMPONENT_TEMPLATE" => ".default"
                ),
                false
            ); ?>
        </div>
        <ul>
            <li>
                <a href="/personal/cart/wish.php"><span class="fa">&#xf08a;</span> Избранное<i id="wishcount"><? echo $delaydBasketItems; ?></i></a>
            </li>
            <li id="compare_list_count">
                <?
                $APPLICATION->IncludeComponent(
                    "bitrix:catalog.compare.list",
                    "compare_top",
                    array(
                        "IBLOCK_TYPE" => "yml_import", //Сюда ваш тип инфоблока каталога
                        "IBLOCK_ID" => "30", //Сюда ваш ID инфоблока каталога
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "AJAX_OPTION_HISTORY" => "N",
                        "DETAIL_URL" => "#SECTION_CODE#",
                        "COMPARE_URL" => "/catalog/compare.php",
                        "NAME" => "CATALOG_COMPARE_LIST",
                        "AJAX_OPTION_ADDITIONAL" => ""
                    ),
                    false
                );
                ?>
            </li>
            <li id="basket-container">
                <?
                $APPLICATION->IncludeComponent(
                    "bazarow:basket.small.bazarow",
                    "ajax",
                    Array(
                        "COMPONENT_TEMPLATE" => "ajax",
                        "PATH_TO_BASKET" => "/personal/cart",
                        "PATH_TO_ORDER" => "/personal/cart",
                        "SHOW_DELAY" => "N",
                        "SHOW_NOTAVAIL" => "Y",
                        "SHOW_SUBSCRIBE" => "Y"
                    )
                );
                ?>
            </li>
        </ul>
    </div>
    <div class="clb"></div>
</div>


<div class="site_container">
    <div class="header">
        <div class="header_left">
            <a href="/" class="logo" title="BXSTORE магазин техники на битрикс">
                <img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo.png" alt="BXSTORE магазин техники на битрикс">
                <span>Вымышленный сайт-магазин компьютерной техники</span>
            </a>
        </div>
        <div class="header_middle">
            <? $APPLICATION->IncludeComponent("bitrix:menu", "top_multimenu", Array(
                "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                "CHILD_MENU_TYPE" => "section",    // Тип меню для остальных уровней
                "DELAY" => "N",    // Откладывать выполнение шаблона меню
                "MAX_LEVEL" => "2",    // Уровень вложенности меню
                "MENU_CACHE_GET_VARS" => array(    // Значимые переменные запроса
                    0 => "",
                ),
                "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                "MENU_CACHE_TYPE" => "N",    // Тип кеширования
                "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
            ),
                false
            ); ?>
            <? $APPLICATION->IncludeComponent("bitrix:search.title", "top_search", Array(
                "CATEGORY_0" => array(    // Ограничение области поиска
                    0 => "iblock_yml_import",
                ),
                "CATEGORY_0_TITLE" => "",    // Название категории
                "CATEGORY_0_iblock_yml_import" => array(    // Искать в информационных блоках типа "iblock_yml_import"
                    0 => "21",
                ),
                "CHECK_DATES" => "N",    // Искать только в активных по дате документах
                "CONTAINER_ID" => "title-search",    // ID контейнера, по ширине которого будут выводиться результаты
                "INPUT_ID" => "title-search-input",    // ID строки ввода поискового запроса
                "NUM_CATEGORIES" => "1",    // Количество категорий поиска
                "ORDER" => "date",    // Сортировка результатов
                "PAGE" => "#SITE_DIR#search/index.php",    // Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
                "SHOW_INPUT" => "Y",    // Показывать форму ввода поискового запроса
                "SHOW_OTHERS" => "N",    // Показывать категорию "прочее"
                "TOP_COUNT" => "5",    // Количество результатов в каждой категории
                "USE_LANGUAGE_GUESS" => "Y",    // Включить автоопределение раскладки клавиатуры
            ),
                false
            ); ?>
        </div>
        <div class="header_right">
            <div class="phone">
                <span class="fa">&#xf017;</span>
                <small>24/7</small>
                <a href="tel:00000000">+7 812 903 2517</a>
            </div>
            <ul>
                <li>
                    <a href="/">Заказать звонок</a>
                </li>
                <li>
                    <a href="/">Адреса магазинов</a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="site_container">
    <div class="content">
        <div class="asidebar">
            <? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"pesedo_left_menu", 
	array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"IBLOCK_ID" => "30",
		"IBLOCK_TYPE" => "yml_import",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "LINE",
		"COMPONENT_TEMPLATE" => "pesedo_left_menu"
	),
	false
); ?>
        </div>
        <div class="workarea">
            <? if ($APPLICATION->GetCurDir() !== '/') { ?>
                <h1><? $APPLICATION->ShowTitle(false); ?></h1>
                <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "breads", Array(
                    "COMPOSITE_FRAME_MODE" => "A",    // Голосование шаблона компонента по умолчанию
                    "COMPOSITE_FRAME_TYPE" => "AUTO",    // Содержимое компонента
                    "PATH" => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                    "SITE_ID" => "s1",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                    "START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
                ),
                    false
                ); ?>
            <? } ?>





