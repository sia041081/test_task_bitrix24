<?php


CModule::IncludeModule("iblock")

$url = "https://catalog.onliner.by/sdapi/catalog.api/search//notebook";

$httpClient = new HttpClient($options);
$httpClient->get($url);
$res = $httpClient->getResult();
$iBlockId = 2;
$jsonData = [];
$excludedIds = [];

try {
    $ar = Json::decode($httpClient->getResult());
} catch (\Exception $e){
    echo 'Ошибка: ',  $e->getMessage(), "\n";
}

foreach($ar as $item){
    $jsonData[$item['id']] = [
        "id" => $item['id'],
        "name" => $item['name'],
        "description" => $item['description']
    ];
}

$testIds = array_keys($jsonData);
// делаем запрос, чтобы узнать что у нас уже записано и складируем
// существующие иденты в переменную для дальнейшей проверки
$elementIterator = ElementTable::getList([
    'select' => [
        'ID',
        'XML_ID',
    ],
    'filter' => [
        'IBLOCK_ID' => $iBlockId,
        'XML_ID' => $testIds,
    ]
]);

while ($element = $elementIterator->fetch()) {
    if (in_array($element['XML_ID'], $testIds)) {
        $excludedIds[] = $element['XML_ID'];
    }
}
//если в исключенных идентах мы не видим текущего - добавляем новый элемент
foreach ($jsonData as $values) {
    if (!in_array($student['id'], $excludedIds)) {
        $newElement = ElementTable::add([
            'MODIFIED_BY' =>  $USER->GetID(),
            'IBLOCK_ID' => $iBlockId,
            'NAME' => $values['description'],
            'CODE' => $values['name'],
            'XML_ID' => $values['id'],
            'ACTIVE' => 'Y'
        ]);

        if (!$newElement->isSuccess()) {
            echo $newElement->getErrorMessages();
        } else {
            echo $newElement->getId();
        }
    }
}
//собираем и выводим
$printData = ElementTable::getList([
    'select' => [
        'ID',
        'NAME',
        'CODE',
        'XML_ID'
    ],
    'filter' => [
        'IBLOCK_ID' => $iBlockId,
    ]
])->fetchAll();

foreach ($printData as $data) {
    echo $data['XML_ID'], ' ';
    echo $data['CODE'], ' ';
    echo $data['NAME'], ' ';
}