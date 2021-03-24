<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<div class="slider_area">
    <ul id="slider">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <li>
                <a href="<? echo $arItem['PREVIEW_TEXT']; ?>" title="<?= $arItem["NAME"] ?>">
                    <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>" />
                </a>
            </li>
        <? endforeach; ?>
    </ul>
</div>


<script type="text/javascript" >
    $(document).ready(function(){
        var sudoSlider = $("#slider").sudoSlider({
            numeric: true
            continuous:true
        });
    });
</script>