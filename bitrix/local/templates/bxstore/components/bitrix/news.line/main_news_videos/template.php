<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="news_lines">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <div class="new_line">
            <a href="<?= $arItem['DETAIL_PAGE_URL']?>">
                <?
                $renderImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 450, "height" => 350), BX_RESIZE_IMAGE_EXACT, false);
                ?>
                <img src="<?= $renderImage["src"] ?>" alt="<?= $arItem["NAME"] ?>"/>
                <h5><? echo $arItem['NAME']; ?></h5>
                <span>
                    <?
                    $arParams["DATE_CREATE"]="j F Y";
                    echo CIBlockFormatProperties::DateFormat($arParams["DATE_CREATE"], MakeTimeStamp($arItem["DATE_CREATE"], CSite::GetDateFormat()));
                    ?>
                </span>
            </a>
        </div>
    <? endforeach; ?>
</div>