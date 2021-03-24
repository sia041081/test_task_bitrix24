<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
?>

<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

//require_once 'curl-master/curl-master/curl.php';
$curl = curl_init();
$url = 'https://catalog.onliner.by/sdapi/catalog.api/search//notebook';
curl_setopt($curl, CURLOPT_URL, $url);

curl_close($curl);

$result = file_get_contents($url);
//echo '<pre>';
//
//print_r(json_decode($result));
//echo '<pre>';
$json = [];
foreach (json_decode($result) as $item => $value){
    foreach ($value as $key => $values ){

        echo '<pre>';
        print_r($values);
        echo '<pre>';
    }

}

$el = new CIBlockElement;
$iBlockId = 1;

$PROP['NAME'] = $values->name;
$PROP['PRICE'] = $values->prices->price_min->amount;

$fields = array(
    "DATE_CREATE" => date("d.m.Y H:i:s"),
    "CREATED_BY" => $GLOBALS['USER']->GetID(),
    "IBLOCK_SECTION" => $section_id[$i],
    "IBLOCK_ID" => $iblock_id,
    "PROPERTY_VALUES" => $PROP,
    "NAME" => $values->name,
    "ACTIVE" => "N",
);




////собираем и выводим
//$printData = ElementTable::getList([
//    'select' => [
//        'ID',
//        'NAME',
//        'CODE',
//        'XML_ID'
//    ],
//    'filter' => [
//        'IBLOCK_ID' => $iBlockId,
//    ]
//])->fetchAll();

foreach ($printData as $data) {
    echo $data['XML_ID'], ' ';
    echo $data['CODE'], ' ';
    echo $data['NAME'], ' ';
}
