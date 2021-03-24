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
<div class="detailnew">
    <img src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>"/>
    <span>
    <?
       $arParams["DATE_CREATE"] = "j F Y";
       echo CIBlockFormatProperties::DateFormat($arParams["DATE_CREATE"], MakeTimeStamp($arResult["DATE_CREATE"], CSite::GetDateFormat()));
    ?>
   </span>
    <p><? echo $arResult["DETAIL_TEXT"]; ?></p>
</div>



