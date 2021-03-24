<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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





<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
<ul class="reviews">
	<li>
    <div class="review-heading">
        <h5 class="name"><?echo $arItem["NAME"]?> &nbsp;&nbsp;</h5>
        <p class="date"><?=$arItem['TIMESTAMP_X']?></p>
        <div class="review-rating">
            <? if (!empty($arItem['PROPERTIES']['RATING']['VALUE']) and $arItem['PROPERTIES']['RATING']['VALUE']  >= 1){
                echo '<i class="fa fa-star"></i>';
            } else {
                echo '<i class="fa fa-star-o empty"></i>';
            }
            ?>
            <? if (!empty($arItem['PROPERTIES']['RATING']['VALUE']) and $arItem['PROPERTIES']['RATING']['VALUE'] >= 2){
                echo '<i class="fa fa-star"></i>';
            } else {
                echo '<i class="fa fa-star-o empty"></i>';
            }
            ?>
            <? if (!empty($arItem['PROPERTIES']['RATING']['VALUE']) and $arItem['PROPERTIES']['RATING']['VALUE'] >= 3){
                echo '<i class="fa fa-star"></i>';
            } else {
                echo '<i class="fa fa-star-o empty"></i>';
            }
            ?>
            <? if (!empty($arItem['PROPERTIES']['RATING']['VALUE']) and $arItem['PROPERTIES']['RATING']['VALUE'] >= 4){
                echo '<i class="fa fa-star"></i>';
            } else {
                echo '<i class="fa fa-star-o empty"></i>';
            }
            ?>
            <? if (!empty($arItem['PROPERTIES']['RATING']['VALUE']) and $arItem['PROPERTIES']['RATING']['VALUE'] >= 5){
                echo '<i class="fa fa-star"></i>';
            } else {
                echo '<i class="fa fa-star-o empty"></i>';
            }
            ?>

<!--            <i class="fa fa-star"></i>-->
<!--            <i class="fa fa-star"></i>-->
<!--            <i class="fa fa-star"></i>-->

        </div>
    </div>
        <br>
    <div class="review-body">
        <p><?=$arItem['PROPERTIES']['REVIEW']['VALUE'];?></p>
    </div>

</li>
</ul>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<?//
//    echo '<pre>';
//    print_r($arResult);
//    echo '<pre>';?>




