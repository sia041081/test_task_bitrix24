<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("");

//Подключаем модуль инфоблоков
CModule::IncludeModule('iblock');
$IBLOCK_ID = 12; //ИД инфоблока с которым работаем
?>

