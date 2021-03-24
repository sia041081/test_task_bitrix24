<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="newslist">
    <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?><br/>
    <? endif; ?>
    <div class="clb"></div>
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="newitem" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>" class="row">
                <div class="col-lg-3">
                    <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"/>
                </div>
                <div class="col-lg-9">
                    <h3><? echo $arItem["NAME"] ?></h3>
                    <span>
                     <?
                     $arParams["DATE_CREATE"] = "j F Y";
                     echo CIBlockFormatProperties::DateFormat($arParams["DATE_CREATE"], MakeTimeStamp($arItem["DATE_CREATE"], CSite::GetDateFormat()));
                     ?>
                    </span>
                    <p><? echo $arItem["PREVIEW_TEXT"]; ?></p>
                </div>
                <div class="clb"></div>
            </a>
        </div>
    <? endforeach; ?>
    <div class="clb"></div>
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <br/><?= $arResult["NAV_STRING"] ?>
    <? endif; ?>

</div>

