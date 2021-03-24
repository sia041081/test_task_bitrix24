<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<div class="profits">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="prof" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>"/>
            <span><? echo $arItem['NAME']; ?></span>
        </div>
    <? endforeach; ?>
</div>

