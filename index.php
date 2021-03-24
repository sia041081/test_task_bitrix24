<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("Главная");

?>


    <br>
 <!-- SECTION -->
<div class="section">
	 <!-- container -->
	<div class="container">
		 <!-- row -->
		<div class="row">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:highloadblock.list",
	"high.list",
	Array(
		"BLOCK_ID" => "5",
		"CHECK_PERMISSIONS" => "N",
		"COMPONENT_TEMPLATE" => "high.list",
		"DETAIL_URL" => "",
		"FILTER_NAME" => "ID",
		"PAGEN_ID" => "",
		"ROWS_PER_PAGE" => "",
		"SORT_FIELD" => "ID",
		"SORT_ORDER" => "ASC"
	)
);?>
		</div>
	</div>
</div>
 <!-- /SECTION --> <!-- SECTION --> <!-- SECTION -->
<div class="section">
	 <!-- container -->
	<div class="container">
		 <!-- row -->
		<div class="row">
			 <!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">New Products</h3>
				</div>
			</div>
			 <!-- /section title --> <!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						 <!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
								 <!-- product --> <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.top",
	"template111",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"BASKET_URL" => "/personal/basket.php",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"CUSTOM_FILTER" => "",
		"DETAIL_URL" => "",
		"DISPLAY_COMPARE" => "N",
		"ELEMENT_COUNT" => "9",
		"ELEMENT_SORT_FIELD" => "timestamp_x",
		"ELEMENT_SORT_FIELD2" => "",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "catalog",
		"LINE_ELEMENT_COUNT" => "3",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"OFFERS_LIMIT" => "5",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array("11"),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"ROTATE_TIMER" => "30",
		"SECTION_URL" => "",
		"SEF_MODE" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PAGINATION" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"VIEW_MODE" => "SECTION"
	)
);?><br>
							</div>
							<div id="slick-nav-1" class="products-slick-nav">
							</div>
						</div>
						 <!-- /tab -->
					</div>
				</div>
			</div>
			 <!-- Products tab & slick -->
		</div>
		 <!-- /row -->
	</div>
	 <!-- /container -->
</div>
 <!-- /SECTION --> <!-- /tab --> <!-- /SECTION --> <!-- /SECTION --> <!-- SECTION -->
<div class="section">
	 <!-- container -->
	<div class="container">
		 <!-- row -->
		<div class="row">
			 <!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Top selling</h3>
				</div>
			</div>
			 <!-- /section title --> <!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						 <!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">
								 <!-- product --> <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.top",
	"template111",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"BASKET_URL" => "/personal/basket.php",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"DETAIL_URL" => "",
		"DISPLAY_COMPARE" => "N",
		"ELEMENT_COUNT" => "9",
		"ELEMENT_SORT_FIELD" => "name",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "catalog",
		"LINE_ELEMENT_COUNT" => "3",
		"OFFERS_LIMIT" => "5",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array("11"),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"SECTION_URL" => "",
		"SEF_MODE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N"
	)
);?><br>
							</div>
							<div id="slick-nav-2" class="products-slick-nav">
							</div>
						</div>
						 <!-- /tab -->
					</div>
				</div>
			</div>
			 <!-- /Products tab & slick -->
		</div>
		 <!-- /row -->
	</div>
	 <!-- /container -->
</div>
 <!-- /SECTION --> <!-- /Products tab & slick --> <!-- /row --> <!-- /container --> <!-- /SECTION --> <!-- NEWSLETTER -->
<div id="newsletter" class="section">
	 <!-- container -->
	<div class="container">
		 <!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="newsletter">
					<p>
						 Sign Up for the <strong>NEWSLETTER</strong>
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
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <script>
    $(document).ready(function () {
        $('#select_btn').click(function () {
            let u1_input = $("#frm_subscribe").val();
            let SUBSCRIBE = $("#SUBSCRIBE").val();

            $.ajax({
                url: '<?=SITE_TEMPLATE_PATH?>/subscribe/subscribe.php',
                type: 'POST',
                dataType: "html",
                data: {u1_input: u1_input, SUBSCRIBE: SUBSCRIBE},
                success: function (){
                    alert("Вы подписаны")
                }
            });

            $("#cform")[0].reset();
        })
    })
</script> <!-- /row --> <!-- /container -->&nbsp;<br>
 <br><?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>