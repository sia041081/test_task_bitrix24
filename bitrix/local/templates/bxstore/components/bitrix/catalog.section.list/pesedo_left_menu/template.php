<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="left_catalog_menu">
    <?
    $TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
    $CURRENT_DEPTH = $TOP_DEPTH;

    foreach ($arResult["SECTIONS"] as $arSection):
    if ($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"])
        echo "\n", str_repeat("\t", $arSection["DEPTH_LEVEL"] - $TOP_DEPTH), "<ul>";
    elseif ($CURRENT_DEPTH == $arSection["DEPTH_LEVEL"])
        echo "</li>";
    else {
        while ($CURRENT_DEPTH > $arSection["DEPTH_LEVEL"]) {
            echo "</li>";
            echo "\n", str_repeat("\t", $CURRENT_DEPTH - $TOP_DEPTH), "</ul>", "\n", str_repeat("\t", $CURRENT_DEPTH - $TOP_DEPTH - 1);
            $CURRENT_DEPTH--;
        }
        echo "\n", str_repeat("\t", $CURRENT_DEPTH - $TOP_DEPTH), "</li>";
    }

    echo "\n", str_repeat("\t", $arSection["DEPTH_LEVEL"] - $TOP_DEPTH);
    ?>
    <?
    if ($arSection["DEPTH_LEVEL"] == 1) { ?>
    <li class="level_1">
        <a href="<?= $arSection["SECTION_PAGE_URL"] ?>">
            <strong><?= $arSection["NAME"] ?></strong> <span class="fa">&#xf105;</span>
        </a>
        <?
        }else{
        ?>
    <li class="level_2">
        <a href="<?= $arSection["SECTION_PAGE_URL"] ?>">
            <?= $arSection["NAME"] ?>
        </a>
        <?
        }
        $CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
        endforeach;

        while ($CURRENT_DEPTH > $TOP_DEPTH) {
            echo "</li>";
            echo "\n", str_repeat("\t", $CURRENT_DEPTH - $TOP_DEPTH), "</ul>", "\n", str_repeat("\t", $CURRENT_DEPTH - $TOP_DEPTH - 1);
            $CURRENT_DEPTH--;
        }
        ?>
</div>