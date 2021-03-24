<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<div class="blocks_items">
    <? foreach ($arResult["ITEMS"] as $cell => $arElement): ?>
        <div class="blocks_item">
            <div class="over_item">
                <a href="<? echo $arElement["DETAIL_PAGE_URL"] ?>" title="<?= $arElement["NAME"] ?>">
                    <? if (strlen($arElement["DETAIL_PICTURE"]["SRC"]) !== 0) { ?>
                        <div class="image_item"
                             style="background: url(<?= $arElement["DETAIL_PICTURE"]["SRC"] ?>) no-repeat center; background-size: contain"></div>
                    <? } else { ?>
                        <div class="image_item"
                             style="background: url(/local/images/nof.jpg) no-repeat center; background-size: contain"></div>
                    <? } ?>
                    <span>
                     Арт: <? echo $arElement['PROPERTIES']['C_barcode']['DISPLAY_VALUE']; ?>
                </span>
                    <h5>
                        <?
                        $strname = $arElement["NAME"];
                        echo TruncateText($strname, 55);
                        ?>
                    </h5>
                </a>
                <div class="stars">
                    <? $APPLICATION->IncludeComponent("bitrix:iblock.vote", "starstemp", Array(
                        "IBLOCK_TYPE" => "yml_import",    // Тип инфоблока
                        "IBLOCK_ID" => "30",    // Инфоблок
                        "ELEMENT_ID" => $arElement["ID"],    // ID элемента
                        "MAX_VOTE" => "5",    // Максимальный балл
                        "VOTE_NAMES" => array(    // Подписи к баллам
                            0 => "0",
                            1 => "1",
                            2 => "2",
                            3 => "3",
                            4 => "4",
                            5 => "",
                        ),
                        "SET_STATUS_404" => "N",    // Устанавливать статус 404
                        "MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
                        "CACHE_TYPE" => "N",    // Тип кеширования
                        "CACHE_TIME" => "0",    // Время кеширования (сек.)
                        "COMPONENT_TEMPLATE" => "stars",
                        "DISPLAY_AS_RATING" => "vote_avg",    // В качестве рейтинга показывать
                    ),
                        false
                    ); ?>
                </div>
                <div class="price">
                    <? //echo '<pre>'; print_r($arElement); echo'</pre>';?>
                    <? foreach ($arElement["PRICES"] as $code => $arPrice): ?>
                        <? if ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]): ?>
                            <strong><s><?= $arPrice["PRINT_VALUE"] ?></s> <?= $arPrice["PRINT_DISCOUNT_VALUE"] ?>
                            </strong>
                        <? else: ?>
                            <strong><?= $arPrice["PRINT_VALUE"] ?></strong>
                        <? endif; ?>
                    <? endforeach; ?>
                    <div class="clb"></div>
                    <form action="<?= POST_FORM_ACTION_URI ?>" method="post" enctype="multipart/form-data"
                          class="add_form">
                        <input type="text" name="QUANTITY" value="1" size="5" style="display: none;">
                        <input type="hidden" name="<? echo $arParams["ACTION_VARIABLE"] ?>" value="BUY">
                        <input type="hidden" name="<? echo $arParams["PRODUCT_ID_VARIABLE"] ?>" value="<? echo $arElement["ID"] ?>">
                        <input type="submit" name="<? echo $arParams["ACTION_VARIABLE"] . "BUY" ?>" value="<? echo GetMessage("CATALOG_BUY") ?>" style="display: none;">
                        <input type="submit" name="<? echo $arParams["ACTION_VARIABLE"] . "ADD2BASKET" ?>" value=" Купить" class="fa">
                    </form>
                    <button data-id="<?= $arElement['ID'] ?>" class="h2o_add_favor fa">&#xf08a;</button>
                </div>
                <div class="clb"></div>
            </div>
        </div>
    <? endforeach; ?>
</div>


