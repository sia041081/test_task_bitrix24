<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!empty($arResult['ERROR'])) {
    ShowError($arResult['ERROR']);
    return false;
}

global $USER_FIELD_MANAGER;

$GLOBALS['APPLICATION']->SetTitle('Highloadblock Row');

$listUrl = str_replace('#BLOCK_ID#', intval($arParams['BLOCK_ID']), $arParams['LIST_URL']);

?>



<div class="reports-result-list-wrap">
    <div class="report-table-wrap">
        <div class="reports-list-left-corner"></div>
        <div class="reports-list-right-corner"></div>

        <? foreach ($arResult['fields'] as $field): ?>
            <a href="#"><? $title = $field["LIST_COLUMN_LABEL"] ? $field["LIST_COLUMN_LABEL"] : $field['FIELD_NAME']; ?></a></h3>
            <?
            $valign = "";
            $html = $USER_FIELD_MANAGER->getListView($field, $arResult['row'][$field['FIELD_NAME']]);
            ?>

            <div class="product-body">
                <h4 class="product-name"><?=$title ?></h4>
                <h4 class="product-price"><a href="#"><?= $html ?></a></h4>
            </div>

        <? endforeach; ?>

    </div>
</div>