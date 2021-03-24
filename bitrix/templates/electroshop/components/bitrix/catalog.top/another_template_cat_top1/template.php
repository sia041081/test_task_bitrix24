<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>
    <!-- --><?php //  echo '<pre>';
//print_r($arResult);
//echo '</pre>';?>

<? foreach ($arResult['ITEMS'] as $arItem): ?>
    <!-- product -->
    <?
    $ID=$arItem["ID"];
    $res = CIBlockElement::GetByID($ID);
    if($ar_res = $res->GetNext())
        $res = CIBlockSection::GetByID($ar_res["IBLOCK_SECTION_ID"]);
    if($ar_res = $res->GetNext())

    ?>
        <div class="product-widget">
        <div class="product-img">
            <img src="<?= $arItem['DETAIL_PICTURE']['SRC']; ?>"  alt="">
        </div>
        <div class="product-body" style="width: 100%; height: 5vw;">
            <h3 class="product-name"><a href="#"><?= $arItem['NAME']; ?></a></h3>
            <p class="product-category"><?= $ar_res['NAME']; ?></p>

            <h4 class="product-price">
                BYN <?= $arItem["CATALOG_PRICE_1"] ?>
            </h4>
    </div>
    </div>
    <!-- /product -->
<? endforeach; ?>

<?php //  echo '<pre>';
//print_r($arItem);
//echo '</pre>';?>