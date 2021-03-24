<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<script>
    function add2wish(p_id, pp_id, p, name, dpu, th) {
        $.ajax({
            type: "POST",
            url: "/local/ajax/wishlist.php",
            data: "p_id=" + p_id + "&pp_id=" + pp_id + "&p=" + p + "&name=" + name + "&dpu=" + dpu,
            success: function (html) {
                $(th).addClass('in_wishlist');
                $('#wishcount').html(html);
            }
        });
    };
    function compare_tov(id) {
        var chek = document.getElementById('compareid_' + id);
        if (chek.checked) {
            //Добавить
            var AddedGoodId = id;
            $.get("/local/ajax/list_compare.php",
                {
                    action: "ADD_TO_COMPARE_LIST", id: AddedGoodId
                },
                function (data) {
                    $("#compare_list_count").html(data);
                }
            );
        }
        else {
            //Удалить
            var AddedGoodId = id;
            $.get("/local/ajax/list_compare.php",
                {
                    action: "DELETE_FROM_COMPARE_LIST", id: AddedGoodId
                },
                function (data) {
                    $("#compare_list_count").html(data);
                }
            );
        }
    }
</script>

<!-- Получаем данные есть ли этот товар в отложенных или в корзине -->
<?
$id = $arResult['ID'];
$dbDelayItems = CSaleBasket::GetList(
    array(
        "NAME" => "ASC",
        "ID" => "ASC"
    ),
    array(
        "FUSER_ID" => CSaleBasket::GetBasketUserID(),
        "LID" => SITE_ID,
        "PRODUCT_ID" => $id,
        "ORDER_ID" => "NULL"
    ),
    false,
    false,
    array("PRODUCT_ID", "DELAY")
);
while ($arItemsDelay = $dbDelayItems->Fetch()) {
    if ($arItemsDelay['DELAY'] === 'Y') {
        $itInDelay = 'Yes';
    } else {
        $itInBasket = $arItemsDelay['PRODUCT_ID'];
    }
}
$iblockid = $arResult['IBLOCK_ID'];
if (isset($_SESSION["CATALOG_COMPARE_LIST"][$iblockid]["ITEMS"][$id])) {
    $checked = 'checked';
} else {
    $checked = '';
}
?>
<!-- end Получаем данные есть ли этот товар в отложенных или в корзине -->

<div class="top_detail_item">
    <div class="image_slider">
        <?
        if (count($arResult["MORE_PHOTO"]) > 0) {//Если есть дополнительные картинки, выводим карусель
            ?>
            <div class="list_carousel">
                <a id="prev1" class="prev fa" href="#">&#xf104;</a>
                <a id="next1" class="next fa" href="#">&#xf105;</a>
                <div class="clb"></div>
                <ul id="foo1">
                    <li>
                        <?
                        $renderImageFirst = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], Array("width" => 900, "height" => 900), BX_RESIZE_IMAGE_EXACT, false);
                        ?>
                        <a href="<?= $arResult["DETAIL_PICTURE"]['SRC'] ?>" data-fancybox="group" data-caption="<?= $arResult['NAME'] ?>">
                            <img src="<?= $renderImageFirst["src"] ?>" alt="<?= $arResult["NAME"] ?>" title="<?= $arResult["NAME"] ?>"/>
                        </a>
                    </li>
                    <? foreach ($arResult["MORE_PHOTO"] as $PHOTO): ?>
                        <li>
                            <a href="<?= $PHOTO["SRC"] ?>" data-fancybox="group" data-caption="<?= $arResult['NAME'] ?>">
                                <?
                                $renderImage = CFile::ResizeImageGet($PHOTO, Array("width" => 900, "height" => 900), BX_RESIZE_IMAGE_EXACT, false);
                                ?>
                                <img class="image_sec" width="100%" border="0" src="<?= $renderImage["src"] ?>" alt="<?= $arResult["NAME"] ?>"/>
                            </a>
                        </li>
                    <? endforeach ?>
                </ul>
            </div>
        <? } else { //Иначе- Если есть дополнительные картинки- выводим только основную?>
            <a class="oneimage" href="<?= $arResult["DETAIL_PICTURE"]['SRC'] ?>" data-fancybox="group" data-caption="<?= $arResult['NAME'] ?>">
                <img src="<?= $arResult["DETAIL_PICTURE"]['SRC'] ?>" alt="<?= $arResult["NAME"] ?>" title="<?= $arResult["NAME"] ?>"/>
            </a>
        <? } ?>
        <p class="prew_text">
            <br>
            <?
            $strPrew = $arResult["DETAIL_TEXT"];
            echo TruncateText($strPrew, 200);
            ?>
            <br>
        </p>
    </div>
    <div class="user_actions">
        <div class="art_brand">
            <? $i = 0;
            foreach ($arResult["DISPLAY_PROPERTIES"] as $pid => $arProperty): ?>
                <b><?= $arProperty["NAME"] ?>:</b> <? echo $arProperty["DISPLAY_VALUE"]; ?>
                <? if (++$i == 2) break; endforeach ?>
        </div>
        <div class="price">
            <? foreach ($arResult["PRICES"] as $code => $arPrice): ?>
                <? if ($arPrice["CAN_ACCESS"]): ?>
                    <? if ($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]): ?>
                        <s><?= $arPrice["PRINT_VALUE"] ?></s>
                        <?= $arPrice["PRINT_DISCOUNT_VALUE"] ?>
                    <? else: ?>
                        <?= $arPrice["PRINT_VALUE"] ?>
                    <? endif ?>
                <? endif; ?>
            <? endforeach; ?>
        </div>
        <div class="tobasket">
            <form action="<?= POST_FORM_ACTION_URI ?>" method="post" enctype="multipart/form-data" class="add_form">
                <a href="javascript:void(0)" class="minus" onclick="if (BX('QUANTITY<?= $arElement['ID'] ?>').value &gt; 1) BX('QUANTITY<?= $arElement['ID'] ?>').value--;">-</a>
                <input type="text" name="QUANTITY" value="1" id="QUANTITY<?= $arElement['ID'] ?>"/>
                <a href="javascript:void(0)" class="plus" onclick="BX('QUANTITY<?= $arElement['ID'] ?>').value++;">+</a>
                <input type="hidden" name="<? echo $arParams["ACTION_VARIABLE"] ?>" value="BUY">
                <input type="hidden" name="<? echo $arParams["PRODUCT_ID_VARIABLE"] ?>" value="<? echo $arResult["ID"] ?>">
                <input type="submit" name="<? echo $arParams["ACTION_VARIABLE"] . "BUY" ?>" value="<? echo GetMessage("CATALOG_BUY") ?>" style="display: none;">
                <input type="submit" name="<? echo $arParams["ACTION_VARIABLE"] . "ADD2BASKET" ?>" <? if (isset($itInBasket)) { ?>value=" В корзине" <? } else { ?>value=" В корзину"<? } ?> onclick="if (this.value == ' В корзину') this.value = ' В корзине';" class="fa"
                />
            </form>
            <button data-module="buyoneclick" data-id="<?= $arResult['ID'] ?>">Купить в 1 клик</button>
        </div>
        <div class="clb"></div>
        <div class="wish_compare">
            <noindex>
                <a href="javascript:void(0)" rel="nofollow"
                    <? if ((in_array($arResult["ID"], $delaydBasketItems)) || (isset($itInDelay))) {
                        echo 'class="in_wishlist"';
                    } ?>
                   onclick="add2wish('<?= $arResult["ID"] ?>','<?= $arResult["CATALOG_PRICE_ID_1"] ?>','<?= $arResult["CATALOG_PRICE_1"] ?>','<?= $arResult["NAME"] ?>','<?= $arResult["DETAIL_PAGE_URL"] ?>',this)">
                    <span>В избранное</span>
                    <i>В избранном</i>
                </a>
                <input <?= $checked; ?> type="checkbox" id="compareid_<?= $arResult['ID']; ?>"
                                        onchange="compare_tov(<?= $arResult['ID']; ?>);">
                <label for="compareid_<?= $arResult['ID']; ?>">
                    <span>В сравнение</span>
                    <i>В сравнении</i>
                </label>
            </noindex>
        </div>
        <div class="clb"></div>
        <div class="skills">
            <?
            $ar_res = CCatalogProduct::GetByID($arResult['ID']);
            echo "<div><span class='fa'>&#xf200;</span> В наличии: " . $ar_res['QUANTITY'] . " шт.</div>";
            ?>
            <div><span class="fa">&#xf1b9;</span> Доставка от 300 р.</div>
            <div><span class="fa">&#xf058;</span> Проверка при покупке</div>
            <div><span class="fa">&#xf09d;</span> Доступно в кредит</div>
        </div>
        <div class="share">
            <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
            <script src="//yastatic.net/share2/share.js"></script>
            <div class="ya-share2" data-services="vkontakte,facebook,gplus,twitter,telegram" data-size="s"></div>
        </div>
    </div>
</div>
<div class="clb"></div>
<div class="description">
    <ul class="tabs">
        <li class="active"><a href="#tab1">Характеристики</a></li>
        <li><a href="#tab2">Описание</a></li>
        <li><a href="#tab3">Отзывы</a></li>
    </ul>
    <div class="tab_container">
        <div class="tab_content" id="tab1">
            <ul class="prps_all">
                <? foreach ($arResult["DISPLAY_PROPERTIES"] as $pid => $arProperty): ?>
                    <li>
                        <strong><?= $arProperty["NAME"] ?>:</strong>
                        <span><? echo $arProperty["DISPLAY_VALUE"]; ?></span>
                        <div class="clb"></div>
                    </li>
                <? endforeach ?>
            </ul>
            <div class="clb"></div>
        </div>
        <div class="tab_content" id="tab2">
            <?= $arResult["DETAIL_TEXT"] ?>
        </div>
        <div class="tab_content" id="tab3">
            <?$APPLICATION->IncludeComponent(
                "bitrix:catalog.comments",
                "",
                array(
                    "ELEMENT_ID" => $arResult['ID'],
                    "ELEMENT_CODE" => "",
                    "IBLOCK_ID" => $arParams['IBLOCK_ID'],
                    "SHOW_DEACTIVATED" => $arParams['SHOW_DEACTIVATED'],
                    "URL_TO_COMMENT" => "",
                    "WIDTH" => "",
                    "COMMENTS_COUNT" => "10",
                    "BLOG_USE" => 'Y',
                    "FB_USE" => 'Y',
                    "FB_APP_ID" => $arParams['FB_APP_ID'],
                    "VK_USE" => 'N',
                    "VK_API_ID" => $arParams['VK_API_ID'],
                    "CACHE_TYPE" => $arParams['CACHE_TYPE'],
                    "CACHE_TIME" => $arParams['CACHE_TIME'],
                    'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
                    "BLOG_TITLE" => "",
                    "BLOG_URL" => $arParams['BLOG_URL'],
                    "PATH_TO_SMILE" => "",
                    "EMAIL_NOTIFY" => $arParams['BLOG_EMAIL_NOTIFY'],
                    "AJAX_POST" => "Y",
                    "SHOW_SPAM" => "Y",
                    "SHOW_RATING" => "N",
                    "FB_TITLE" => "",
                    "FB_USER_ADMIN_ID" => "",
                    "FB_COLORSCHEME" => "light",
                    "FB_ORDER_BY" => "reverse_time",
                    "VK_TITLE" => "",
                    "TEMPLATE_THEME" => $arParams['~TEMPLATE_THEME']
                ),
                $component,
                array("HIDE_ICONS" => "Y")
            );?>
        </div>
    </div>
</div>



