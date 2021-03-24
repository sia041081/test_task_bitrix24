<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");



if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog")) { 
   
   if (isset($_POST['id']) && isset($_POST['QUANTITY'])) { 
      $PRODUCT_ID = intval($_POST['id']);
      $QUANTITY = intval($_POST['QUANTITY']);
      Add2BasketByProductID( $PRODUCT_ID, $QUANTITY ); 
   }
   else { echo "Нет параметров";  } 
 } 
else { echo "Не подключены модули"; }




$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", "bottom_basket", array(
	"PATH_TO_BASKET" => "/personal/basket.php",
	"PATH_TO_ORDER" => "/personal/order/make/",
	"SHOW_DELAY" => "Y",
	"SHOW_NOTAVAIL" => "Y",
	"SHOW_SUBSCRIBE" => "Y"
	),
	false
);




require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>