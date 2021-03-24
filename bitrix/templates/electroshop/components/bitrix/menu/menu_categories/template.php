<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>

    <div class="checkbox-filter">

            <?
            foreach ($arResult

            as $arItem):
            if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                continue;
            ?>
            <ul>
                <? if ($arItem["SELECTED"]):?>

                    <li><input type="checkbox" id="category-1">&nbsp &nbsp<a href="<?= $arItem["LINK"] ?>" class="selected"><?= $arItem["TEXT"] ?></a></li>
                <? else:?>
                    <li><input type="checkbox" id="category-1">&nbsp &nbsp<a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                <? endif ?>

                <? endforeach ?>
            </ul>
    </div>
<? endif ?>
<?php
//echo '<pre>';
//print_r($arResult);
//echo '<pre>';
//?>
