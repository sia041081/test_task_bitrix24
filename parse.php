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
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true); //передача в качестве строки
$result = curl_exec($curl);// результат
curl_close($curl);
$array = json_decode($result,true);

foreach ($array['products'] as $arItem) {

        $iBlockId = 1;

        CModule::IncludeModule('iblock');

        $ciBlockElement = new CIBlockElement;
        $product_id = $ciBlockElement->Add(
            array(
                "IBLOCK_ID" => $iBlockId, // IBLOCK товаров
                "IBLOCK_SECTION_ID" => 4,
                "TYPE" => "TYPE_PRODUCT",
                "ID" => $arItem['id'],
                "NAME" => $arItem['name'],
                "PREVIEW_TEXT" => $arItem['extended_name'],
                "DETAIL_TEXT" => $arItem['description'],
                "DETAIL_PICTURE" => CFile::MakeFileArray('https:' . $arItem['images']['header']),
                "ACTIVE" => "Y",

            )
        );
        $priceId = CPrice::Add(array(
            'PRODUCT_ID' => $product_id,
            'CATALOG_GROUP_ID' => 1,//ID_типа_цены - base_cost
            'PRICE' => $arItem['prices']['price_min']['amount'],
            'CURRENCY' => 'BYN'
        ) );

        $obProduct = CCatalogProduct::Add(array(
            'ID' => $product_id,
            'QUANTITY' => 10,
            'QUANTITY_TRACE' => 'Y'
        ));

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
