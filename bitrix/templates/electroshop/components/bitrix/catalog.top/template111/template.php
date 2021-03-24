<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>
<!-- --><?php //  echo '<pre>';
//print_r($arResult);
//echo '</pre>';?>

<? foreach ($arResult['ITEMS'] as $arItem): ?>
    <!-- product -->

    <div class="product" style="height: 100%; width: 100%;">
        <div class="product-img" style="height: 25vh;">
            <img src="<?= $arItem['DETAIL_PICTURE']['SRC']; ?>" style="width: 70%; height: 15ex; margin: auto" alt="">
        </div>
        <div class="product-body" style="width: 100%; height: 14vw;">
            <h3 class="product-name"><a href="#"><?= $arItem['NAME']; ?></a></h3>
            <p class="product-category"><?= mb_substr($arItem['PREVIEW_TEXT'], 0, 10); ?></p>

            <h4 class="product-price">
                $<?= $arItem["CATALOG_PRICE_1"] ?>
            </h4>
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
        </div>
        <div class="add-to-cart">
            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
        </div>
    </div>
    <!-- /product -->
<? endforeach; ?>

<?php //  echo '<pre>';
//print_r($arResult);
//echo '</pre>';?>
