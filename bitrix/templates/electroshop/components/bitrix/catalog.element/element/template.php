<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
    <div class="col-md-5 col-md-push-2">
        <div id="product-main-img">
            <div class="product-preview">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>    " alt="">
            </div>

            <div class="product-preview">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="">
            </div>

            <div class="product-preview">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="">
            </div>

            <div class="product-preview">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="">
            </div>
        </div>
    </div>
    <!-- /Product main img -->

    <!-- Product thumb imgs -->
    <div class="col-md-2  col-md-pull-5">
        <div id="product-imgs">
            <div class="product-preview">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="">
            </div>

            <div class="product-preview">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="">
            </div>

            <div class="product-preview">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="">
            </div>

            <div class="product-preview">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="">
            </div>
        </div>
    </div>
    <!-- /Product thumb imgs -->
    <div class="col-md-5">
        <div class="product-details">
            <h2 class="product-name"><?=$arResult['NAME']?></h2>
            <div>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <a class="review-link" href="#">10 Review(s) | Add your review</a>
            </div>
            <div>
                <h3 class="product-price"><?=$arResult['MIN_PRICE']['PRINT_VALUE_VAT']?> <del class="product-old-price"><?=$arResult['MIN_PRICE']['PRINT_VALUE_VAT']?></del></h3>
                <span class="product-available">In Stock</span>
            </div>
            <p><?echo $arResult["PREVIEW_TEXT"];?> </p>

            <div class="add-to-cart">
                <div class="qty-label">
                    Qty
                    <div class="input-number">
                        <input type="number" id="<?=$arResult['ID']?>" value="1" />
                        <span class="qty-up">+</span>
                        <span class="qty-down">-</span>
                    </div>
                </div>

                <button class="add-to-cart-btn" id="<?=$arResult['ID']?>" href="#" type="button"><i class="fa fa-shopping-cart"></i> add to cart</button>
            </div>

            <ul class="product-links">
                <li>Category:</li>
                <li><a href="#"><?=$arResult['SECTION']['NAME']?></a></li>
            </ul>
        </div>
    </div>
    <!-- /Product details -->
<?
CModule::IncludeModule('iblock');
$arFilter = array(
    'IBLOCK_ID' => 2,
    'ACTIVE' => 'Y',
);
$res = CIBlockElement::GetList(false, $arFilter, array('IBLOCK_ID'));
if ($el = $res->Fetch())
    $el['CNT'];
?>
    <!-- Product tab -->
    <div class="col-md-12">
        <div id="product-tab">
            <!-- product tab nav -->
            <ul class="tab-nav">
                <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                <li><a data-toggle="tab" href="#tab3">Reviews (<?=$el['CNT']?>)</a></li>
            </ul>
            <!-- /product tab nav -->

            <!-- product tab content -->
            <div class="tab-content">
                <!-- tab1  -->
                <div id="tab1" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-md-12">
                            <p><?echo $arResult["DETAIL_TEXT"];?></p>
                            <div style="font-weight: bold;">
                            <? if (!empty($arResult["PROPERTIES"]['ATT_BRAND'])){ echo $arResult['PROPERTIES']['ATT_BRAND']['NAME'] . ':' . ' '.
                                $arResult['PROPERTIES']['ATT_BRAND']['VALUE'] . '<br>';}?>
                            <? if (!empty($arResult["PROPERTIES"]['ATT_PROC']['VALUE'])){ echo $arResult['PROPERTIES']['ATT_PROC']['NAME'] . ':' . ' '.
                                $arResult['PROPERTIES']['ATT_PROC']['VALUE'] . '<br>';}?>
                            <? if (!empty($arResult["PROPERTIES"]['ATT_OZU']['VALUE'])){ echo $arResult['PROPERTIES']['ATT_OZU']['NAME'] . ':' . ' '.
                                $arResult['PROPERTIES']['ATT_OZU']['VALUE'] . '<br>';}?>
                            <? if (!empty($arResult["PROPERTIES"]['ATT_LCD']['VALUE'])){ echo $arResult['PROPERTIES']['ATT_LCD']['NAME'] . ':' . ' '.
                                $arResult['PROPERTIES']['ATT_LCD']['VALUE'] . '<br>';}?>
                            <? if (!empty($arResult["PROPERTIES"]['ATT_COLOR']['VALUE'])){ echo $arResult['PROPERTIES']['ATT_COLOR']['NAME'] . ':' . ' '.
                                $arResult['PROPERTIES']['ATT_COLOR']['VALUE'] . '<br>';}?>
                            <? if (!empty($arResult["PROPERTIES"]['ATT_CORPUS']['VALUE'])){ echo $arResult['PROPERTIES']['ATT_CORPUS']['NAME'] . ':' . ' '.
                                $arResult['PROPERTIES']['ATT_CORPUS']['VALUE'] . '<br>';}?>
                            <? if (!empty($arResult["PROPERTIES"]['ATT_HDD']['VALUE'])){ echo $arResult['PROPERTIES']['ATT_HDD']['NAME'] . ':' . ' '.
                                $arResult['PROPERTIES']['ATT_HDD']['VALUE'] . '<br>';}?>

                            <? if (!empty($arResult["PROPERTIES"]['ATT_PRINT']['VALUE'])){ echo $arResult['PROPERTIES']['ATT_PRINT']['NAME'] . ':' . ' '.
                                $arResult['PROPERTIES']['ATT_PRINT']['VALUE'] . '<br>';}?>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /tab1  -->

                <!-- tab3  -->
                <div id="tab3" class="tab-pane fade in">
                    <div class="row">
                        <div class="col-md-8">
                            <div id="reviews">
                                <!-- /Section --> <!-- /SECTION --> <!-- NEWSLETTER --><?$APPLICATION->IncludeComponent("bitrix:news.list", ".default", Array(
                                    "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
                                    "ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
                                    "AJAX_MODE" => "Y",	// Включить режим AJAX
                                    "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
                                    "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
                                    "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
                                    "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
                                    "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
                                    "CACHE_GROUPS" => "Y",	// Учитывать права доступа
                                    "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                                    "CACHE_TYPE" => "A",	// Тип кеширования
                                    "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
                                    "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                                    "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
                                    "DISPLAY_DATE" => "Y",	// Выводить дату элемента
                                    "DISPLAY_NAME" => "Y",	// Выводить название элемента
                                    "DISPLAY_PICTURE" => "N",	// Выводить изображение для анонса
                                    "DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
                                    "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
                                    "FIELD_CODE" => array(	// Поля
                                        0 => "",
                                        1 => "",
                                    ),
                                    "FILTER_NAME" => "",	// Фильтр
                                    "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
                                    "IBLOCK_ID" => "2",	// Код информационного блока
                                    "IBLOCK_TYPE" => "catalog",	// Тип информационного блока (используется только для проверки)
                                    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
                                    "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
                                    "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
                                    "NEWS_COUNT" => "20",	// Количество новостей на странице
                                    "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
                                    "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
                                    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
                                    "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
                                    "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
                                    "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
                                    "PAGER_TITLE" => "Новости",	// Название категорий
                                    "PARENT_SECTION" => "",	// ID раздела
                                    "PARENT_SECTION_CODE" => "",	// Код раздела
                                    "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
                                    "PROPERTY_CODE" => array(	// Свойства
                                        0 => "NAME",
                                        1 => "REVIEW",
                                        2 => "EMAIL",
                                        3 => "",
                                    ),
                                    "SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
                                    "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
                                    "SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
                                    "SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
                                    "SET_STATUS_404" => "N",	// Устанавливать статус 404
                                    "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
                                    "SHOW_404" => "N",	// Показ специальной страницы
                                    "SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
                                    "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
                                    "SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
                                    "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
                                    "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
                                ),
                                    false
                                );?>
                        </div>
                        </div>
                        <? if ($USER->IsAuthorized()) : ?>
                        <div class="col-md-4">
                            <div id="review-form">
                                <form class="review-form" id="form" name="form" onsubmit="return validateForm()">
                                    <input type="hidden" id="product_id" value="<?=$arResult['ID']?>">
                                    <input class="input" id="name" type="text" placeholder="Your Name">
                                    <input  class="input field" id="email" type="email" name="email" placeholder="Your Email" required>
                                    <textarea class="input field" id="line" name="line" placeholder="Your Review"></textarea>
                                    <div class="input-rating">
                                        <span>Your Rating: </span>
                                        <div class="stars">
                                            <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                            <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                            <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                            <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                            <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                        </div>
                                    </div>
                                    <button class="primary-btn" id="lopata" type="button">Submit</button>
                                </form>
                    </div>
                </div>
                        <? endif;?>
                <!-- /tab3  -->
            </div>
            <!-- /product tab content  -->
        </div>
            </div>
    </div>

    <div class="section">
    <!-- container -->
    <div class="container">
    <!-- row -->
    <div class="row">
    <div class="col-md-12">
        <div class="section-title text-center">
            <h3 class="title">Related Products</h3>
        </div>
    </div>


    <?php
                global $arrFilter;

                $arrFilter = array('!ID' => $arResult['ID']);

                ?>
                <div  style="width: 70%; margin: 0 25% ">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:catalog.section",
                        "1111",
                        array(
                            "ACTION_VARIABLE" => "action",
                            "ADD_PROPERTIES_TO_BASKET" => "Y",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "ADD_TO_BASKET_ACTION" => "ADD",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "BACKGROUND_IMAGE" => "-",
                            "BASKET_URL" => "/personal/basket.php",
                            "BROWSER_TITLE" => "-",
                            "CACHE_FILTER" => "N",
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "COMPATIBLE_MODE" => "Y",
                            "CONVERT_CURRENCY" => "N",
                            "DETAIL_URL" => "",
                            "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                            "DISPLAY_BOTTOM_PAGER" => "Y",
                            "DISPLAY_COMPARE" => "N",
                            "DISPLAY_TOP_PAGER" => "N",
                            "ELEMENT_SORT_FIELD" => "sort",
                            "ELEMENT_SORT_FIELD2" => "id",
                            "ELEMENT_SORT_ORDER" => "asc",
                            "ELEMENT_SORT_ORDER2" => "desc",
                            "ENLARGE_PRODUCT" => "STRICT",
                            "FILTER_NAME" => "arrFilter",
                            "HIDE_NOT_AVAILABLE" => "N",
                            "HIDE_NOT_AVAILABLE_OFFERS" => "N",
                            "IBLOCK_ID" => "1",
                            "IBLOCK_TYPE" => "catalog",
                            "INCLUDE_SUBSECTIONS" => "A",
                            "LAZY_LOAD" => "N",
                            "LINE_ELEMENT_COUNT" => "3",
                            "LOAD_ON_SCROLL" => "N",
                            "MESSAGE_404" => "",
                            "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                            "MESS_BTN_BUY" => "Купить",
                            "MESS_BTN_DETAIL" => "Подробнее",
                            "MESS_BTN_SUBSCRIBE" => "Подписаться",
                            "MESS_NOT_AVAILABLE" => "Нет в наличии",
                            "META_DESCRIPTION" => "-",
                            "META_KEYWORDS" => "-",
                            "OFFERS_LIMIT" => "5",
                            "PAGER_BASE_LINK_ENABLE" => "N",
                            "PAGER_DESC_NUMBERING" => "N",
                            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                            "PAGER_SHOW_ALL" => "N",
                            "PAGER_SHOW_ALWAYS" => "N",
                            "PAGER_TEMPLATE" => ".default",
                            "PAGER_TITLE" => "Товары",
                            "PAGE_ELEMENT_COUNT" => "18",
                            "PARTIAL_PRODUCT_PROPERTIES" => "N",
                            "PRICE_CODE" => array(
                                0 => "11",
                            ),
                            "PRICE_VAT_INCLUDE" => "Y",
                            "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
                            "PRODUCT_ID_VARIABLE" => "id",
                            "PRODUCT_PROPS_VARIABLE" => "prop",
                            "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                            "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
                            "PRODUCT_SUBSCRIPTION" => "Y",
                            "RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
                            "RCM_TYPE" => "personal",
                            "SECTION_CODE" => "",
                            "SECTION_ID" => $arResult["SECTION"]["ID"],
                            "SECTION_ID_VARIABLE" => "SECTION_ID",
                            "SECTION_URL" => "",
                            "SECTION_USER_FIELDS" => array(
                                0 => "",
                                1 => "",
                            ),
                            "SEF_MODE" => "N",
                            "SET_BROWSER_TITLE" => "Y",
                            "SET_LAST_MODIFIED" => "N",
                            "SET_META_DESCRIPTION" => "Y",
                            "SET_META_KEYWORDS" => "Y",
                            "SET_STATUS_404" => "N",
                            "SET_TITLE" => "Y",
                            "SHOW_404" => "N",
                            "SHOW_ALL_WO_SECTION" => "N",
                            "SHOW_CLOSE_POPUP" => "N",
                            "SHOW_DISCOUNT_PERCENT" => "N",
                            "SHOW_FROM_SECTION" => "N",
                            "SHOW_MAX_QUANTITY" => "N",
                            "SHOW_OLD_PRICE" => "N",
                            "SHOW_PRICE_COUNT" => "1",
                            "SHOW_SLIDER" => "Y",
                            "TEMPLATE_THEME" => "blue",
                            "USE_ENHANCED_ECOMMERCE" => "N",
                            "USE_MAIN_ELEMENT_SECTION" => "N",
                            "USE_PRICE_COUNT" => "N",
                            "USE_PRODUCT_QUANTITY" => "N",
                            "COMPONENT_TEMPLATE" => "1111",
                            "CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}"
                        ),
                        false
                    );?>
                </div>
    </div>
    </div>

    <!-- /Section -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $(".add-to-cart button").click(function() {

            var parent = $(this).parent().parent();
            var count = parent.find('input').val();
            var id = parent.find('button').attr('id');

            $.ajax({
                type: "POST",
                url: "<?=SITE_TEMPLATE_PATH?>/components/bitrix/catalog.element/add2basket.php",
                data: {id: id, QUANTITY: count},
                success: function(data){alert("Товар добавлен в заказ")}
            });


            return false;

        });

    });
</script>
<?php
//echo '<pre>';
//print_r($arParams);
//echo '<pre>';
    ?>

        <script type="text/javascript">

            $(document).ready(function () {

                $("#lopata").click(function() {

                    var x = document.forms["form"]["email"].value;
                        if (x == "") {
                            alert("Необходимо ввести email");
                            return false;
                        }
                    var parent = $(this).parent().parent().parent();
                    var name = $("#name").val();
                    var email = $("#email").val();
                    var line = $("#line").val();
                    var product_id = $("#product_id").val();
                    if (document.getElementById('star1').checked) {
                      var star1 = document.getElementById('star1').value;
                    }
                    if (document.getElementById('star2').checked) {
                      var star2 = document.getElementById('star2').value;
                    }
                    if (document.getElementById('star3').checked) {
                        var star3 = document.getElementById('star3').value;
                    }
                    if (document.getElementById('star4').checked) {
                        var star4 = document.getElementById('star4').value;
                    }
                    if (document.getElementById('star5').checked) {
                        var star5 = document.getElementById('star5').value;
                    }



                    // var star1 = $("#star1").val();
                    // var star2 = $("#star2").val();
                    // var star3 = $("#star3").val();
                    // var star4 = $("#star4").val();
                    // var star5 = $("#star5").val();


                    $.ajax({
                        type: "POST",
                        url: "/add_form_result.php",
                        data: {name: name, email: email, line: line, product_id: product_id, star5: star5, star4: star4, star3: star3, star2: star2, star1: star1 },
                        success: function(data){alert('Спасибо за отзыв')}

                    });

                    $('#form')[0].reset();
                    return false;

                });

            });
        </script>
