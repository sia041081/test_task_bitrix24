<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<!-- aside Widget -->
<div class="aside">
    <h3 class="aside-title">Categories</h3>
    <div class="checkbox-filter">


        <? $APPLICATION->IncludeComponent(
            "bitrix:catalog.section.list",
            "",
            array(
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"]
            ),
            $component
        );
        ?>
    </div>
</div>
<? if ($arParams["USE_COMPARE"] == "Y"): ?>
    <? $APPLICATION->IncludeComponent(
        "bitrix:catalog.compare.list",
        "",
        array(
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "NAME" => $arParams["COMPARE_NAME"],
            "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
            "COMPARE_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["compare"],
        ),
        $component
    ); ?>
    <br/>
<? endif ?>


<?php //  echo '<pre>';
//print_r($arParams);
//echo '</pre>';?>