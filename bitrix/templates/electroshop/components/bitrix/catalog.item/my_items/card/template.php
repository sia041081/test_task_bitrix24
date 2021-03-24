<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
?>

<div class="row">
<div class="product" style="margin: 10px; height: 350px">
    <div class="product-img">
        <a class="product-item-image-wrapper" href="<?= $item['DETAIL_PAGE_URL'] ?>" title="<?= $imgTitle ?>"
           data-entity="image-wrapper" style="">
	<div data-entity="image-wrapper">
		<div id="<?= $itemIds['PICT_SLIDER'] ?>"
			<?= ($showSlider ? '' : 'style="display: none;"') ?>
			data-slider-interval="<?= $arParams['SLIDER_INTERVAL'] ?>" data-slider-wrap="true">
			<?
            if ($showSlider) {
                foreach ($morePhoto as $key => $photo) {
                    ?>

                    <img src="<?= $photo['SRC'] ?>" alt="">

                    <?
                }
            }
            ?>
		</div>
		<div class="product-item-image-original" id="<?= $itemIds['PICT'] ?>"
              style="background-image: url('<?= $item['PREVIEW_PICTURE']['SRC'] ?>'); <?= ($showSlider ? 'display: none;' : '') ?>">
		</div>
		<?
        if ($item['SECOND_PICT']) {
            $bgImage = !empty($item['PREVIEW_PICTURE_SECOND']) ? $item['PREVIEW_PICTURE_SECOND']['SRC'] : $item['PREVIEW_PICTURE']['SRC'];
            ?>
            <div class="product-item-image-alternative" id="<?= $itemIds['SECOND_PICT'] ?>"
                  style="background-image: url('<?= $bgImage ?>'); <?= ($showSlider ? 'display: none;' : '') ?>">
			</div>
            <?
        }

        if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y') {
            ?>

            <?
        }

        if ($item['LABEL']) {
            ?>

            <?
        }
        ?>

		<?
        if ($arParams['SLIDER_PROGRESS'] === 'Y') {
            ?>

            <?
        }
        ?>

        </a>
    </div>
    <div class="product-body" style="margin: 0; padding: 10px">
        <div class="product-name" >
            <? if ($itemHasDetailUrl): ?>
            <a href="<?= $item['DETAIL_PAGE_URL'] ?>" title="<?= $productTitle ?>">
                <? endif; ?>
                <?= substr($productTitle , 0 , 15) ?>
                <? if ($itemHasDetailUrl): ?>
            </a>
        <? endif; ?>
        </div>
        <br>
        <br>
<? foreach ($arResult as $arItem): ?>
    <!-- product -->
    <?
    $ID=$arItem["ID"];
    $res = CIBlockElement::GetByID($ID);
    if($ar_res = $res->GetNext())
        $res = CIBlockSection::GetByID($ar_res["IBLOCK_SECTION_ID"]);
    if($ar_res = $res->GetNext())

        ?>
        <p class="product-category"><?= $ar_res['NAME']; ?></p>
    <?php endforeach; ?>

        <?
        if (!empty($arParams['PRODUCT_BLOCKS_ORDER'])) {
            foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName) {
                switch ($blockName) {
                    case 'price': ?>
                        <div class="product-price" id="<?= $itemIds['PRICE'] ?>" style="font-weight: bold">
                        <div  data-entity="price-block">
                            <?
                            if ($arParams['SHOW_OLD_PRICE'] === 'Y') {
                                ?>

                                <?
                            }
                            ?>

							<?
                            if (!empty($price)) {
                                if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers) {
                                    echo Loc::getMessage(
                                        'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
                                        array(
                                            '#PRICE#' => $price['PRINT_RATIO_PRICE'],
                                            '#VALUE#' => $measureRatio,
                                            '#UNIT#' => $minOffer['ITEM_MEASURE']['TITLE']
                                        )
                                    );
                                } else {
                                    echo $price['PRINT_RATIO_PRICE'];
                                }
                            }
                            ?>
						</div>
                        </div>
                        <?
                        break;

                    case 'quantityLimit':
                        if ($arParams['SHOW_MAX_QUANTITY'] !== 'N') {
                            if ($haveOffers) {
                                if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y') {
                                    ?>

                                    <?
                                }
                            } else {
                                if (
                                    $measureRatio
                                    && (float)$actualItem['CATALOG_QUANTITY'] > 0
                                    && $actualItem['CATALOG_QUANTITY_TRACE'] === 'Y'
                                    && $actualItem['CATALOG_CAN_BUY_ZERO'] === 'N'
                                ) {
                                    ?>

                                    <?
                                }
                            }
                        }

                        break;

                    case 'quantity':
                        if (!$haveOffers) {
                            if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY']) {
                                ?>

                                <?
                            }
                        } elseif ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y') {
                            if ($arParams['USE_PRODUCT_QUANTITY']) {
                                ?>

                                <?
                            }
                        }

                        break;

                    case 'buttons':
                        ?>
                        <div class="product-item-info-container product-item-hidden" data-entity="buttons-block">
                            <?
                            if (!$haveOffers) {
                                if ($actualItem['CAN_BUY']) {
                                    ?>
                                    <div class="add-to-cart" id="<?= $itemIds['BASKET_ACTIONS'] ?>">
                                        <form action=javascript:void(0)" rel="nofollow">
                                            <button class="add-to-cart-btn" type="submit"
                                                    id="<?= $itemIds['BUY_LINK'] ?>"><i class="fa fa-shopping-cart"></i>
                                                add to cart
                                            </button>
                                        </form>
                                    </div>
                                    <?
                                } else {
                                    ?>

                                    <?
                                }
                            } else {
                                if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y') {
                                    ?>

                                    <?
                                } else {
                                    ?>

                                    <?
                                }
                            }
                            ?>
                        </div>
                        <?
                        break;

                    case 'props':
                        if (!$haveOffers) {
                            if (!empty($item['DISPLAY_PROPERTIES'])) {
                                ?>

                                <?
                            }

                            if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !empty($item['PRODUCT_PROPERTIES'])) {
                                ?>
                                <div id="<?= $itemIds['BASKET_PROP_DIV'] ?>" style="display: none;">
                                    <?
                                    if (!empty($item['PRODUCT_PROPERTIES_FILL'])) {
                                        foreach ($item['PRODUCT_PROPERTIES_FILL'] as $propID => $propInfo) {
                                            ?>
                                            <input type="hidden"
                                                   name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propID ?>]"
                                                   value="<?= htmlspecialcharsbx($propInfo['ID']) ?>">
                                            <?
                                            unset($item['PRODUCT_PROPERTIES'][$propID]);
                                        }
                                    }

                                    if (!empty($item['PRODUCT_PROPERTIES'])) {
                                        ?>

                                        <?
                                    }
                                    ?>
                                </div>
                                <?
                            }
                        } else {
                            $showProductProps = !empty($item['DISPLAY_PROPERTIES']);
                            $showOfferProps = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $item['OFFERS_PROPS_DISPLAY'];

                            if ($showProductProps || $showOfferProps) {
                                ?>

                                <?
                            }
                        }

                        break;

                    case 'sku':
                        if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $haveOffers && !empty($item['OFFERS_PROP'])) {
                            ?>

                            <?
                            foreach ($arParams['SKU_PROPS'] as $skuProperty) {
                                if (!isset($item['OFFERS_PROP'][$skuProperty['CODE']]))
                                    continue;

                                $skuProps[] = array(
                                    'ID' => $skuProperty['ID'],
                                    'SHOW_MODE' => $skuProperty['SHOW_MODE'],
                                    'VALUES' => $skuProperty['VALUES'],
                                    'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
                                );
                            }

                            unset($skuProperty, $value);

                            if ($item['OFFERS_PROPS_DISPLAY']) {
                                foreach ($item['JS_OFFERS'] as $keyOffer => $jsOffer) {
                                    $strProps = '';

                                    if (!empty($jsOffer['DISPLAY_PROPERTIES'])) {
                                        foreach ($jsOffer['DISPLAY_PROPERTIES'] as $displayProperty) {
                                            $strProps .= '<dt>' . $displayProperty['NAME'] . '</dt><dd>'
                                                . (is_array($displayProperty['VALUE'])
                                                    ? implode(' / ', $displayProperty['VALUE'])
                                                    : $displayProperty['VALUE'])
                                                . '</dd>';
                                        }
                                    }

                                    $item['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
                                }
                                unset($jsOffer, $strProps);
                            }
                        }

                        break;
                }
            }
        }

        if (
            $arParams['DISPLAY_COMPARE']
            && (!$haveOffers || $arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
        ) {
            ?>

            <?
        }
        ?>
    </div>
</div>
</div>
</div>
<?php
//echo '<pre>';
//print_r($arResult);
//echo '<pre>';