<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

//require_once 'curl-master/curl-master/curl.php';
$curl = curl_init();
$url = 'https://catalog.onliner.by/sdapi/catalog.api/search//notebook';
curl_setopt($curl, CURLOPT_URL, $url);

curl_close($curl);

$result = file_get_contents($url);

$array = json_decode($result, true);
foreach ($array as $item ) {
    foreach ($item as $key) {

        $iBlockId = 1;

        CModule::IncludeModule('iblock');

        $ciBlockElement = new CIBlockElement;
        $product_id = $ciBlockElement->Add(
            array(
                "IBLOCK_ID" => $iBlockId, // IBLOCK товаров
                "IBLOCK_SECTION_ID" => 1,
                "TYPE" => "TYPE_PRODUCT",
                "ID" => $key['id'],
                "NAME" => $key['name'],
                "PREVIEW_TEXT" => $key['extended_name'],
                "DETAIL_TEXT" => $key['description'],
                "DETAIL_PICTURE" => CFile::MakeFileArray('https:' . $key['images']['header']),
                "ACTIVE" => "Y",

            )
        );
        $id = $product_id->ID;
        $priceId = CPrice::Add(array(
            'PRODUCT_ID' => $id,
            'CATALOG_GROUP_ID' => 1,//ID_типа_цены - base_cost
            'PRICE' => ($key['prices']['price_min']['amount']),
            'CURRENCY' => 'BYN'
        ) );
        if (!$priceId)
        {
            if ($ex = $APPLICATION->GetException())
                echo 'Ошибка создания цены: '.$ex->GetString();
            else
                echo 'Неизвестная ошибка при создании цены';
            unset($ex);
        }

        if (!empty($ciBlockElement->LAST_ERROR)) {
            echo "Ошибка добавления товара: " . $ciBlockElement->LAST_ERROR;
            die();
        }
    }
}
