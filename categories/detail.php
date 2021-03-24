<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("categories");
$APPLICATION->AddChainItem('Все категории', '/categories/');
?><div class="section">
	<div class="container">
		 <!-- row -->
		<div class="row">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.element",
	"element",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_DETAIL_TO_SLIDER" => "N",
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_TO_BASKET_ACTION" => array(0=>"ADD",),
		"ADD_TO_BASKET_ACTION_PRIMARY" => array(),
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BRAND_USE" => "N",
		"BROWSER_TITLE" => "-",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_SECTION_ID_VARIABLE" => "N",
		"COMPATIBLE_MODE" => "Y",
		"COMPONENT_TEMPLATE" => "element",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_PICTURE_MODE" => array(0=>"POPUP",1=>"MAGNIFIER",),
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"ELEMENT_CODE" => "",
		"ELEMENT_ID" => $_REQUEST["ID"],
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "catalog",
		"IMAGE_RESOLUTION" => "16by9",
		"LABEL_PROP" => array(0=>"ATT_PROC",1=>"ATT_OZU",2=>"ATT_COLOR",),
		"LABEL_PROP_MOBILE" => array(),
		"LABEL_PROP_POSITION" => "top-left",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_COMMENTS_TAB" => "Комментарии",
		"MESS_DESCRIPTION_TAB" => "Описание",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_PRICE_RANGES_TITLE" => "Цены",
		"MESS_PROPERTIES_TAB" => "Характеристики",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "0",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"PRICE_CODE" => array(0=>"11",),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"SECTION_CODE" => "",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "#IBLOCK_ID#",
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "Y",
		"SET_CANONICAL_URL" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SET_VIEWED_IN_COMPONENT" => "N",
		"SHOW_404" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_COMMENTS" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"USE_RATIO_IN_RANGES" => "N",
		"USE_VOTE_RATING" => "N"
	)
);?>
		</div>
		 <!-- /row -->
	</div>
</div>

<div id="newsletter" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="newsletter">
					<p>
						 Sign Up for the <strong>N</strong><strong>EWSLETTER</strong>
					</p>
					<form action="" method="post" id="cform">
 <input id="SUBSCRIBE" value="Y" type="hidden"> <input type="email" class="input" id="frm_subscribe" placeholder="Enter Your Email"> <button type="button" id="select_btn" class="newsletter-btn"><i class="fa fa-envelope"></i>
						Subscribe </button>
					</form>
					<ul class="newsletter-follow">
						<li><a href="#"><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "include/include_area_facebook.php",
		"EDIT_TEMPLATE" => ""
	)
);?></a></li>
						<li><a href="#"><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "include/include_area_twitter.php",
		"EDIT_TEMPLATE" => ""
	)
);?></a></li>
						<li><a href="#"><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "include/include_area_instagram.php",
		"EDIT_TEMPLATE" => ""
	)
);?></a></li>
						<li><a href="#"><?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "include/include_area_pinterest.php",
		"EDIT_TEMPLATE" => ""
	)
);?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#select_btn').click(function () {
                let u1_input = $("#frm_subscribe").val();
                let SUBSCRIBE = $("#SUBSCRIBE").val();

                $.ajax({
                    url: '<?=SITE_TEMPLATE_PATH?>/subscribe/subscribe.php',
                    type: 'POST',
                    dataType: "html",
                    data: {u1_input: u1_input, SUBSCRIBE: SUBSCRIBE},
                    success: function () {
                        alert("Вы подписаны")
                    }
                });

                $("#cform")[0].reset();
            })
        })
    </script> <!-- /row --> <!-- /container --><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>