<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
<?
global $USER; ?>
<?
$email = $_POST['u1_input'];
if (CModule::IncludeModule("subscribe")) {
    if ($_POST["SUBSCRIBE"] == "Y") {
        $arFields = array(
            "USER_ID" => $USER->GetID(),
            "FORMAT" => "html",
            "EMAIL" => $email,
            "ACTIVE" => "Y",
            "RUB_ID" => 1,
            "CONFIRMED" => "Y"
        );
        $subscr = new CSubscription;
        $ID = $subscr->Add($arFields);
        if ($ID > 0) {
            CSubscription::Authorize($ID);
        }
    }
}
echo "Вы успешно подписались";
