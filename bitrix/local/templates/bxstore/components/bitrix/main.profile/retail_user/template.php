<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>
<div class="cbl"></div>
<div class="bxauth_profile">
    <? ShowError($arResult["strProfileError"]); ?>
    <?
    if ($arResult['DATA_SAVED'] == 'Y')
        ShowNote(GetMessage('PROFILE_DATA_SAVED'));
    ?>
    <script type="text/javascript">
        <!--
        var opened_sections = [<?
            $arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"] . "_user_profile_open"];
            $arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
            if (strlen($arResult["opened"]) > 0) {
                echo "'" . implode("', '", explode(",", $arResult["opened"])) . "'";
            } else {
                $arResult["opened"] = "reg";
                echo "'reg'";
            }
            ?>];
        //-->
        var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
    </script>
    <form method="post" name="form1" action="<?= $arResult["FORM_TARGET"] ?>" enctype="multipart/form-data">
        <?= $arResult["BX_SESSION_CHECK"] ?>
        <input type="hidden" name="lang" value="<?= LANG ?>"/>
        <input type="hidden" name="ID" value=<?= $arResult["ID"] ?>/>
        <div class="one_item">
            <b>Вы заходили на сайт</b>
            <?= $arResult["arUser"]["LAST_LOGIN"] ?>
        </div>
        <div class="one_item">
            <b>Ваш <?= GetMessage('LOGIN') ?> для входа</b>
            <input type="text" name="LOGIN" maxlength="50" value="<? echo $arResult["arUser"]["LOGIN"] ?>"/>
        </div>
        <? if ($arResult["arUser"]["EXTERNAL_AUTH_ID"] == ''): ?>
            <div class="one_item">
                <b>Изменение пароля для входа</b>
                <input type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off"
                       class="bx-auth-input"/>
                <? if ($arResult["SECURE_AUTH"]): ?>
                    <span class="bx-auth-secure" id="bx_auth_secure" title="<? echo GetMessage("AUTH_SECURE_NOTE") ?>"
                          style="display:none">
                        <div class="bx-auth-secure-icon"></div>
                    </span>
                    <noscript>
                    <span class="bx-auth-secure" title="<? echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
                        <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                    </span>
                    </noscript>
                    <script type="text/javascript">
                        document.getElementById('bx_auth_secure').style.display = 'inline-block';
                    </script>
                <? endif ?>
            </div>
            <div class="one_item">
                <b><?= GetMessage('NEW_PASSWORD_CONFIRM') ?></b>
                <input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off"/>
            </div>
        <? endif ?>
        <h2>Регистрационная информация</h2>
        <div class="one_item">
            <b><?= GetMessage('EMAIL') ?></b>
            <input type="text" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"] ?>"/>
        </div>
        <div class="one_item">
            <b><? echo GetMessage("main_profile_title") ?></b>
            <input type="text" name="TITLE" value="<?= $arResult["arUser"]["TITLE"] ?>"/>
        </div>
        <div class="one_item">
            <b><?= GetMessage('NAME') ?></b>
            <input type="text" name="NAME" maxlength="50" value="<?= $arResult["arUser"]["NAME"] ?>"/>
        </div>
        <div class="one_item">
            <b><?= GetMessage('LAST_NAME') ?></b>
            <input type="text" name="LAST_NAME" maxlength="50" value="<?= $arResult["arUser"]["LAST_NAME"] ?>"/>
        </div>
        <div class="one_item">
            <b><?= GetMessage('SECOND_NAME') ?></b>
            <input type="text" name="SECOND_NAME" maxlength="50" value="<?= $arResult["arUser"]["SECOND_NAME"] ?>"/>
        </div>
        <h2>Личные данные</h2>
        <div class="one_item">
            <b><?= GetMessage('USER_PROFESSION') ?></b>
            <input type="text" name="PERSONAL_PROFESSION" maxlength="255" value="<?= $arResult["arUser"]["PERSONAL_PROFESSION"] ?>"/>
        </div>
        <div class="one_item">
            <b><?= GetMessage('USER_WWW') ?></b>
            <input type="text" name="PERSONAL_WWW" maxlength="255" value="<?= $arResult["arUser"]["PERSONAL_WWW"] ?>"/>
        </div>
        <div class="one_item">
            <b><?= GetMessage('USER_ICQ') ?></b>
            <input type="text" name="PERSONAL_ICQ" maxlength="255" value="<?= $arResult["arUser"]["PERSONAL_ICQ"] ?>"/>
        </div>
        <div class="one_item">
            <b><?= GetMessage("USER_BIRTHDAY_DT") ?> (<?= $arResult["DATE_FORMAT"] ?>)</b>
            <?
            $APPLICATION->IncludeComponent(
                'bitrix:main.calendar',
                '',
                array(
                    'SHOW_INPUT' => 'Y',
                    'FORM_NAME' => 'form1',
                    'INPUT_NAME' => 'PERSONAL_BIRTHDAY',
                    'INPUT_VALUE' => $arResult["arUser"]["PERSONAL_BIRTHDAY"],
                    'SHOW_TIME' => 'N'
                ),
                null,
                array('HIDE_ICONS' => 'Y')
            );
            ?>
        </div>
        <div class="one_item">
            <b><?= GetMessage('USER_MOBILE') ?></b>
            <input type="text" name="PERSONAL_MOBILE" maxlength="255" value="<?= $arResult["arUser"]["PERSONAL_MOBILE"] ?>"/>
        </div>
        <div class="one_item">
            <b><?= GetMessage('USER_COUNTRY') ?></b>
            <?= $arResult["COUNTRY_SELECT"] ?>
        </div>
        <div class="one_item">
            <b><?= GetMessage('USER_STATE') ?></b>
            <input type="text" name="PERSONAL_STATE" maxlength="255" value="<?= $arResult["arUser"]["PERSONAL_STATE"] ?>"/>
        </div>
        <div class="one_item">
            <b><?= GetMessage('USER_CITY') ?></b>
            <input type="text" name="PERSONAL_CITY" maxlength="255" value="<?= $arResult["arUser"]["PERSONAL_CITY"] ?>"/>
        </div>
        <div class="one_item">
            <b><?= GetMessage('USER_ZIP') ?></b>
            <input type="text" name="PERSONAL_ZIP" maxlength="255" value="<?= $arResult["arUser"]["PERSONAL_ZIP"] ?>"/>
        </div>
        <div class="one_item">
            <b><?= GetMessage("USER_STREET") ?></b>
            <textarea cols="30" rows="5" name="PERSONAL_STREET"><?= $arResult["arUser"]["PERSONAL_STREET"] ?></textarea>
        </div>
        <br>
        <div class="one_item">
        <b></b>
        <input type="submit" name="save" value="Сохранить данные" class="btn btn-success">

        </div>
    </form>
</div>