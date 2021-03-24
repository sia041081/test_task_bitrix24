<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

ShowMessage($arParams["~AUTH_RESULT"]);

?>
<div class="forms">
<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	<p>
	<?=GetMessage("AUTH_FORGOT_PASSWORD_1")?>
	</p>

    <b><?=GetMessage("AUTH_GET_CHECK_STRING")?></b>
    <br><br>


    <input type="text" name="USER_LOGIN" maxlength="50" style="display: none;" value="<?=$arResult["LAST_LOGIN"]?>" />
	<input type="text" name="USER_EMAIL" maxlength="255" placeholder="Ваш email"/>

	<input type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />


    <h5 class="as_social">Восстановить через соц.сеть:</h5>
    <?php
    $APPLICATION->IncludeComponent(
        "ulogin:auth",
        "",
        Array(
            "PROVIDERS" => "vkontakte,odnoklassniki,mailru,facebook",
            "HIDDEN" => "other",
            "TYPE" => "large",
            "SEND_MAIL" => "N",
            "SOCIAL_LINK" => "Y",
            "GROUP_ID" => array("5"),
            "ULOGINID1" => "",
            "ULOGINID2" => ""
        )
    );
    ?>

</form>
</div>
<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
