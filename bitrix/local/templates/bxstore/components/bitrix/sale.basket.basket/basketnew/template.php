<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<div class="catalog_page">
    <div class="row">
        <div class="col-lg-12">
            <?
            $templateData = array(
                'TEMPLATE_THEME' => $this->GetFolder() . '/themes/' . $arParams['TEMPLATE_THEME'] . '/style.css',
                'TEMPLATE_CLASS' => 'bx_' . $arParams['TEMPLATE_THEME'],
            );
            $this->addExternalCss($templateData['TEMPLATE_THEME']);

            $curPage = $APPLICATION->GetCurPage() . '?' . $arParams["ACTION_VARIABLE"] . '=';
            $delayPage = '/personal/cart/wish.php?' . $arParams["ACTION_VARIABLE"] . '=';
            $arUrls = array(
                "delete" => $curPage . "delete&id=#ID#",
                "delay" => $curPage . "delay&id=#ID#",
            );
            unset($curPage);

            $arParams['USE_ENHANCED_ECOMMERCE'] = isset($arParams['USE_ENHANCED_ECOMMERCE']) && $arParams['USE_ENHANCED_ECOMMERCE'] === 'Y' ? 'Y' : 'N';
            $arParams['DATA_LAYER_NAME'] = isset($arParams['DATA_LAYER_NAME']) ? trim($arParams['DATA_LAYER_NAME']) : 'dataLayer';
            $arParams['BRAND_PROPERTY'] = isset($arParams['BRAND_PROPERTY']) ? trim($arParams['BRAND_PROPERTY']) : '';

            $arBasketJSParams = array(
                'SALE_DELETE' => GetMessage("SALE_DELETE"),
                'SALE_DELAY' => GetMessage("SALE_DELAY"),
                'SALE_TYPE' => GetMessage("SALE_TYPE"),
                'TEMPLATE_FOLDER' => $templateFolder,
                'DELETE_URL' => $arUrls["delete"],
                'DELAY_URL' => $arUrls["delay"],
                'ADD_URL' => $arUrls["add"],
                'EVENT_ONCHANGE_ON_START' => (!empty($arResult['EVENT_ONCHANGE_ON_START']) && $arResult['EVENT_ONCHANGE_ON_START'] === 'Y') ? 'Y' : 'N',
                'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
                'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
                'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY']
            );
            ?>
            <script type="text/javascript">
                var basketJSParams = <?=CUtil::PhpToJSObject($arBasketJSParams);?>
            </script>
            <?
            $APPLICATION->AddHeadScript($templateFolder . "/script.js");



            if (strlen($arResult["ERROR_MESSAGE"]) <= 0) {
                ?>
                <div id="warning_message">
                    <?
                    if (!empty($arResult["WARNING_MESSAGE"]) && is_array($arResult["WARNING_MESSAGE"])) {
                        foreach ($arResult["WARNING_MESSAGE"] as $v)
                            ShowError($v);
                    }
                    ?>
                </div>
                <?
                $normalCount = count($arResult["ITEMS"]["AnDelCanBuy"]);
                $normalHidden = ($normalCount == 0) ? 'style="display:none;"' : '';
                ?>
                <form method="post" action="<?= POST_FORM_ACTION_URI ?>" name="basket_form" id="basket_form">
                    <div id="basket_form_container">
                        <div class="bx_ordercart <?= $templateData['TEMPLATE_CLASS']; ?>">
                            <?
                            include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/basket_items.php");
                            //include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/basket_items_delayed.php");
                            //include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/basket_items_subscribed.php");
                            //include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/basket_items_not_available.php");
                            ?>
                        </div>
                    </div>
                    <input type="hidden" name="BasketOrder" value="BasketOrder"/>
                    <!-- <input type="hidden" name="ajax_post" id="ajax_post" value="Y"> -->
                </form>
                <?
            } else {
                ShowError($arResult["ERROR_MESSAGE"]);
            }
            ?>
        </div>
    </div>
</div>
